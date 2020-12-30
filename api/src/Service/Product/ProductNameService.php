<?php


namespace App\Service\Product;


use App\Repository\ProductRepository;

class ProductNameService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    public function getNames(): array
    {
        $products = $this->productRepository->findAll();
        $array = [];

        foreach ($products as $product) {
            $array[] = [
                'id' => $product->getId(),
                'name' => $product->getName()
            ];
        }

        return $array;
    }
}