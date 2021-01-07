<?php


namespace App\Controller\Listener;


use DateTime;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Lexik\Bundle\JWTAuthenticationBundle\Events;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTAuthenticatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class JWTSubscriber implements EventSubscriberInterface
{
    public const REFRESH_TIME = 1800;   //30 min
    private $payload;
    private $user;
    private JWTTokenManagerInterface $jwtManager;

    public function __construct(JWTTokenManagerInterface $jwtManager)
    {
        $this->jwtManager = $jwtManager;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::JWT_CREATED => 'onJWTCreated',
            Events::JWT_AUTHENTICATED => 'onAuthenticatedAccess',
            KernelEvents::RESPONSE => 'onAuthenticatedResponse',
            Events::AUTHENTICATION_FAILURE => 'onAuthenticatedFail'
        ];
    }

    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        /** @var User $user */
        $user = $event->getUser();

        $payload = $event->getData();
        $payload['id'] = $user->getId();
        unset($payload['roles']);

        $event->setData($payload);
    }

    public function onAuthenticatedResponse(ResponseEvent $event): void
    {
        if($this->payload && $this->user)
        {
            $expireTime = $this->payload['exp'] - time();
            if($expireTime < static::REFRESH_TIME)
            {
                $jwt = $this->jwtManager->create($this->user);
                $response = $event->getResponse();

                $response->headers->setCookie(
                    new Cookie(
                        "BEARER",
                        $jwt,
                        new DateTime("+8 hour"),
                        "/",
                        null,
                        false,
                        true
                    )
                );
            }
        }
    }

    public function onAuthenticatedAccess(JWTAuthenticatedEvent $event): void
    {
        $this->payload = $event->getPayload();
        $this->user = $event->getToken()->getUser();
    }

    public function onAuthenticatedFail(AuthenticationFailureEvent $event): void
    {
        $data = [
            'class' => 'App\\Exceptions\\WrongCredentials',
            'status'  => '401 Unauthorized',
            'message' => 'Bad credentials',
        ];

        $response = new JsonResponse();
        $response->setData($data);

        $event->setResponse($response);
    }
}