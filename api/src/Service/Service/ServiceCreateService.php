<?php


namespace App\Service\Service;

use App\Entity\Service;
use App\Exceptions\AlreadyExistsException;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class ServiceCreateService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Service $service): Service
    {
        try {
            $this->entityManager->persist($service);
            $this->entityManager->flush();
        } catch (Exception $exception) {
            AlreadyExistsException::from('Service', $service->getName());
        }

        return $service;
    }
}