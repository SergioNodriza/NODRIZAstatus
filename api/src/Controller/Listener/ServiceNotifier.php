<?php


namespace App\Controller\Listener;


use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class ServiceNotifier
{
    private const State1 = "Funcional";
    private const State2 = "Error";
    private const State3 = "Advertencias Medias";
    private const State4 = "Advertencias Leves";

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function postUpdate(LifecycleEventArgs $event): void
    {
        $serviceUpdated = $event->getObject();

        if (!$serviceUpdated instanceof Service) {
            return;
        }
        
        $product = $serviceUpdated->getProduct();
        $services = $product->getServices();

        $countServiceError = 0;
        $countServiceLMedia = 0;
        $countServiceLeve = 0;

        foreach ($services as $service) {

            $state = $service->getState();

            switch ($state) {
                case self::State2:
                    $countServiceError++;
                    break;
                case self::State3:
                    $countServiceLMedia++;
                    break;
                case self::State4:
                    $countServiceLeve++;
                    break;
            }
        }

        if ($countServiceError > 0) {
            $product->setState(self::State2);
        } elseif ($countServiceLMedia > 0) {
            $product->setState(self::State3);
        } elseif ($countServiceLeve > 0) {
            $product->setState(self::State4);
        } else {
            $product->setState(self::State1);
        }

        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }
}