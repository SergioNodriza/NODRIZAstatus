<?php


namespace App\Service\Product;


use App\Repository\ProductRepository;

class GeneralStateService
{
    private const Name = 'NodrizaTech';

    private const State1 = "Funcional";
    private const State2 = "Error";
    private const State3 = "Advertencias";
    private const State4 = "Advertencias Leves";


    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getState(): array
    {
        $products = $this->productRepository->findAll();

        $countProductsError = 0;
        $countProductsMedias = 0;
        $countProductsLeves = 0;

        foreach ($products as $product) {
            $state = $product->getState();

            switch ($state) {
                case self::State2:
                    $countProductsError++;
                    break;
                case self::State3:
                    $countProductsMedias++;
                    break;
                case self::State4:
                    $countProductsLeves++;
                    break;
            }
        }

        if ($countProductsError > 0) {
            $generalState = self::State2;
        } elseif ($countProductsMedias > 0) {
            $generalState = self::State3;
        } else if ($countProductsLeves) {
            $generalState = self::State4;
        } else {
            $generalState = self::State1;
        }

        $generalStateArray[] = [
            'name' => self::Name,
            'generalState' => $generalState
        ];

        return $generalStateArray;
    }
}