<?php

namespace App\Controller\Action\Incident;


use App\Entity\Incident;
use App\Service\Incident\IncidentCreateService;

class CreateIncident
{
    private IncidentCreateService $incidentCreateService;

    public function __construct(IncidentCreateService $incidentCreateService)
    {
        $this->incidentCreateService = $incidentCreateService;
    }

    public function __invoke(Incident $data): Incident
    {
        return $this->incidentCreateService->create($data);
    }
}