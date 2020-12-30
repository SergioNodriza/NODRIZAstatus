<?php


namespace App\Service\User;

use App\Entity\User;
use App\Exceptions\AlreadyExistsException;
use App\Service\Password\EncoderService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class UserCreateService
{
    private EntityManagerInterface $entityManager;
    private EncoderService $encoderService;

    public function __construct(EntityManagerInterface $entityManager, EncoderService $encoderService)
    {
        $this->entityManager = $entityManager;
        $this->encoderService = $encoderService;
    }

    public function create(User $user): User
    {
        $user->setPassword($this->encoderService->generateEncodedPassword($user, $user->getPassword()));

        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (Exception $e) {
            AlreadyExistsException::from('User', $user->getName());
        }

        return $user;
    }
}