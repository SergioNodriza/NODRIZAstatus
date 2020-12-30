<?php


namespace App\Controller\Action\Product;


use App\Service\Product\ProductNameService;
use Symfony\Component\HttpFoundation\JsonResponse;

class NameProduct
{
    private ProductNameService $productNameService;

    public function __construct(ProductNameService $productNameService)
    {

        $this->productNameService = $productNameService;
    }

    public function __invoke() {
        $array = $this->productNameService->getNames();
        return new JsonResponse($array);
    }
}