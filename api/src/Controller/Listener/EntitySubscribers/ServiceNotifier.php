<?php


namespace App\Controller\Listener\EntitySubscribers;


use App\Entity\Service;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class ServiceNotifier implements EventSubscriber
{
    private const State1 = "Funcional";
    private const State2 = "Error";
    private const State3 = "Advertencias";
    private const State4 = "Advertencias Leves";

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::preRemove,
            Events::postUpdate,
        ];
    }

    public function preRemove(LifecycleEventArgs $event): void
    {
        $this->action($event, "-");
    }

    public function postUpdate(LifecycleEventArgs $event): void
    {
        $this->action($event);
    }

    public function action(LifecycleEventArgs $event, $signo = null): void
    {
        $serviceUpdated = $event->getObject();

        if (!$serviceUpdated instanceof Service) {
            return;
        }

        $product = $serviceUpdated->getProduct();
        $services = $product->getServices();

        $countServiceError = 0;
        $countServiceLMedia = 0;
        $countServiceLeve = 0;

        foreach ($services as $service) {

            $state = $service->getState();

            switch ($state) {
                case self::State2:
                    $countServiceError++;
                    break;
                case self::State3:
                    $countServiceLMedia++;
                    break;
                case self::State4:
                    $countServiceLeve++;
                    break;
            }
        }

        if (isset($signo)) {
            $state = $serviceUpdated->getState();
            switch ($state) {
                case self::State2:
                    $countServiceError--;
                    break;
                case self::State3:
                    $countServiceLMedia--;
                    break;
                case self::State4:
                    $countServiceLeve--;
                    break;
            }
        }

        if ($countServiceError > 0) {
            $product->setState(self::State2);
        } elseif ($countServiceLMedia > 0) {
            $product->setState(self::State3);
        } elseif ($countServiceLeve > 0) {
            $product->setState(self::State4);
        } else {
            $product->setState(self::State1);
        }

        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }
}