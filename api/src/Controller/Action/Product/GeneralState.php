<?php


namespace App\Controller\Action\Product;


use App\Service\Product\GeneralStateService;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeneralState
{
    private GeneralStateService $generalStateService;

    public function __construct(GeneralStateService $generalState)
    {

        $this->generalStateService = $generalState;
    }

    public function __invoke() {
        $state = $this->generalStateService->getState();
        return new JsonResponse($state);
    }
}