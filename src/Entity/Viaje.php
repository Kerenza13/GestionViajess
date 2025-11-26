<?php

namespace App\Entity;

use App\Repository\ViajeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ViajeRepository::class)]
class Viaje
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $destino_ida = null;

    #[ORM\Column(length: 255)]
    private ?string $transporte_ida = null;

    #[ORM\Column]
    private ?\DateTime $salida_ida_datetime = null;

    #[ORM\Column]
    private ?\DateTime $llegada_destino_datetime = null;

    #[ORM\Column(length: 255)]
    private ?string $lugar_vuelta = null;

    #[ORM\Column(length: 255)]
    private ?string $transporte_vuelta = null;

    #[ORM\Column]
    private ?\DateTime $salida_vuelta_datetime = null;

    #[ORM\Column]
    private ?\DateTime $llegada_origen_datetime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestinoIda(): ?string
    {
        return $this->destino_ida;
    }

    public function setDestinoIda(string $destino_ida): static
    {
        $this->destino_ida = $destino_ida;

        return $this;
    }

    public function getTransporteIda(): ?string
    {
        return $this->transporte_ida;
    }

    public function setTransporteIda(string $transporte_ida): static
    {
        $this->transporte_ida = $transporte_ida;

        return $this;
    }

    public function getSalidaIdaDatetime(): ?\DateTime
    {
        return $this->salida_ida_datetime;
    }

    public function setSalidaIdaDatetime(\DateTime $salida_ida_datetime): static
    {
        $this->salida_ida_datetime = $salida_ida_datetime;

        return $this;
    }

    public function getLlegadaDestinoDatetime(): ?\DateTime
    {
        return $this->llegada_destino_datetime;
    }

    public function setLlegadaDestinoDatetime(\DateTime $llegada_destino_datetime): static
    {
        $this->llegada_destino_datetime = $llegada_destino_datetime;

        return $this;
    }

    public function getLugarVuelta(): ?string
    {
        return $this->lugar_vuelta;
    }

    public function setLugarVuelta(string $lugar_vuelta): static
    {
        $this->lugar_vuelta = $lugar_vuelta;

        return $this;
    }

    public function getTransporteVuelta(): ?string
    {
        return $this->transporte_vuelta;
    }

    public function setTransporteVuelta(string $transporte_vuelta): static
    {
        $this->transporte_vuelta = $transporte_vuelta;

        return $this;
    }

    public function getSalidaVueltaDatetime(): ?\DateTime
    {
        return $this->salida_vuelta_datetime;
    }

    public function setSalidaVueltaDatetime(\DateTime $salida_vuelta_datetime): static
    {
        $this->salida_vuelta_datetime = $salida_vuelta_datetime;

        return $this;
    }

    public function getLlegadaOrigenDatetime(): ?\DateTime
    {
        return $this->llegada_origen_datetime;
    }

    public function setLlegadaOrigenDatetime(\DateTime $llegada_origen_datetime): static
    {
        $this->llegada_origen_datetime = $llegada_origen_datetime;

        return $this;
    }
}
