<?php


namespace App\Controller\Action\Product;


use App\Entity\Product;
use App\Service\Product\ProductCreateService;

class CreateProduct
{
    private ProductCreateService $productCreateService;

    public function __construct(ProductCreateService $productCreateService)
    {
        $this->productCreateService = $productCreateService;
    }

    public function __invoke(Product $data): Product
    {
        return $this->productCreateService->create($data);
    }
}