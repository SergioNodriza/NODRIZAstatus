<?php


namespace App\Service\Product;

use App\Entity\Product;
use App\Exceptions\AlreadyExistsException;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class ProductCreateService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Product $product): Product
    {
        try {
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch (Exception $exception) {
            AlreadyExistsException::from('Product', $product->getName());
        }

        return $product;
    }
}