<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Service
{
    /*
     * Timestampable trait
     */
    use Timestampable;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="services")
     */
    private $product;

    /**
     * @ORM\ManyToMany(targetEntity=Incident::class, mappedBy="services", cascade={"persist"})
     */
    private $incidents;

    public function __construct()
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->setState("Funcional");
        $this->incidents = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection|Incident[]
     */
    public function getIncidents(): Collection
    {
        return $this->incidents;
    }

    public function addIncident(Incident $incident): self
    {
        if (!$this->incidents->contains($incident)) {
            $this->incidents[] = $incident;
        }

        return $this;
    }

    public function removeIncident(Incident $incident): self
    {
        $this->incidents->removeElement($incident);

        return $this;
    }
}
