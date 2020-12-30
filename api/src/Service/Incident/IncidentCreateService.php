<?php

namespace App\Service\Incident;

use App\Entity\Incident;
use App\Exceptions\AlreadyExistsException;
use Doctrine\ORM\EntityManagerInterface;
use Exception;


class IncidentCreateService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Incident $incident): Incident
    {
        try {
            $this->entityManager->persist($incident);
            $this->entityManager->flush();
        } catch (Exception $exception) {
            AlreadyExistsException::from('Incidence', $incident->getName());
        }

        return $incident;
    }
}