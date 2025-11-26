<?php

namespace App\Entity;

use App\Repository\ActividadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActividadRepository::class)]
class Actividad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, viajeros>
     */
    #[ORM\OneToMany(targetEntity: viajeros::class, mappedBy: 'id_actividad')]
    private Collection $viajero_id;

    #[ORM\Column]
    private ?\DateTime $fechahora = null;

    #[ORM\Column(length: 255)]
    private ?string $lugar = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->viajero_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Collection<int, viajeros>
     */
    public function getViajeroId(): Collection
    {
        return $this->viajero_id;
    }

    public function addViajeroId(viajeros $viajeroId): static
    {
        if (!$this->viajero_id->contains($viajeroId)) {
            $this->viajero_id->add($viajeroId);
            $viajeroId->setIdActividad($this);
        }

        return $this;
    }

    public function removeViajeroId(viajeros $viajeroId): static
    {
        if ($this->viajero_id->removeElement($viajeroId)) {
            // set the owning side to null (unless already changed)
            if ($viajeroId->getIdActividad() === $this) {
                $viajeroId->setIdActividad(null);
            }
        }

        return $this;
    }

    public function getFechahora(): ?\DateTime
    {
        return $this->fechahora;
    }

    public function setFechahora(\DateTime $fechahora): static
    {
        $this->fechahora = $fechahora;

        return $this;
    }

    public function getLugar(): ?string
    {
        return $this->lugar;
    }

    public function setLugar(string $lugar): static
    {
        $this->lugar = $lugar;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
