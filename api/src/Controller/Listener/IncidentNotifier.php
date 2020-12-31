<?php


namespace App\Controller\Listener;


use App\Entity\Incident;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class IncidentNotifier
{
    private const IncidentState1 = "En investigación";
    private const IncidentState2 = "Trabajando en ello";

    private const IncidentGravity1 = "Baja";
    private const IncidentGravity2 = "Media";
    private const IncidentGravity3 = "Crítica";

    private const State1 = "Funcional";
    private const State2 = "Error";
    private const State3 = "Advertencias Medias";
    private const State4 = "Advertencias Leves";

    private const LimitNumberBajas= 4;
    private const LimitNumberMedias = 2;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function postUpdate(LifecycleEventArgs $event): void
    {
        $incidentUpdated = $event->getObject();

        if (!$incidentUpdated instanceof Incident) {
            return;
        }

        $services = $incidentUpdated->getServices();

        foreach ($services as $service) {

            $incidents = $service->getIncidents();

            $countOpenIncidents = 0;
            $countOpenIncidentsBaja = 0;
            $countOpenIncidentsMedia = 0;
            $countOpenIncidentsCritica = 0;

            foreach ($incidents as $incident) {

                $state = $incident->getState();

                if ($state === self::IncidentState1 || $state === self::IncidentState2) {

                    $countOpenIncidents++;

                    switch ($incident->getGravity()) {
                        case self::IncidentGravity1:
                            $countOpenIncidentsBaja++;
                            break;
                        case self::IncidentGravity2:
                            $countOpenIncidentsMedia++;
                            break;
                        case self::IncidentGravity3:
                            $countOpenIncidentsCritica++;
                            break;
                        default:
                            break;
                    }
                }
            }

            if ($countOpenIncidents === 0) {
                $service->setState(self::State1);
            } elseif ($countOpenIncidentsCritica > 0) {
                $service->setState(self::State2);
            } elseif ($countOpenIncidentsMedia > self::LimitNumberMedias || $countOpenIncidentsBaja > self::LimitNumberBajas) {
                $service->setState(self::State3);
            } else {
                $service->setState(self::State4);
            }

            $this->entityManager->persist($service);
            $this->entityManager->flush();
        }
    }
}