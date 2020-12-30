<?php


namespace App\Controller\Action\Service;


use App\Entity\Service;
use App\Service\Service\ServiceCreateService;

class CreateService
{
    private ServiceCreateService $serviceCreateService;

    public function __construct(ServiceCreateService $serviceCreateService)
    {
        $this->serviceCreateService = $serviceCreateService;
    }

    public function __invoke(Service $data): Service
    {
        return $this->serviceCreateService->create($data);
    }
}