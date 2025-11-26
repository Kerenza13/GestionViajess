<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellidos = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $referencia = null;

    #[ORM\Column]
    private ?int $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $procedencia = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $foto = null;

    #[ORM\Column(length: 255)]
    private ?string $destino_ida = null;

    #[ORM\Column(length: 255)]
    private ?string $transporte_ida = null;

    #[ORM\Column]
    private ?\DateTime $salida_time_ida = null;

    #[ORM\Column]
    private ?\DateTime $llegada_time_ida = null;

    #[ORM\Column(length: 255)]
    private ?string $lugar_vuelta = null;

    #[ORM\Column(length: 255)]
    private ?string $transporte_vuelta = null;

    #[ORM\Column]
    private ?\DateTime $salida_time_vuelta = null;

    #[ORM\Column]
    private ?\DateTime $llegada_time_vuelta = null;

    #[ORM\Column]
    private ?\DateTime $created_at = null;

    #[ORM\Column]
    private ?\DateTime $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Proyecto $proyecto = null;

    /**
     * @var Collection<int, Actividad>
     */
    #[ORM\OneToMany(targetEntity: Actividad::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $actividads;

    public function __construct()
    {
        $this->actividads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0".self::class."\0password"] = hash('crc32c', $this->password);

        return $data;
    }

    #[\Deprecated]
    public function eraseCredentials(): void
    {
        // @deprecated, to be removed when upgrading to Symfony 8
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): static
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(?string $referencia): static
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getProcedencia(): ?string
    {
        return $this->procedencia;
    }

    public function setProcedencia(string $procedencia): static
    {
        $this->procedencia = $procedencia;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): static
    {
        $this->foto = $foto;

        return $this;
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

    public function getSalidaTimeIda(): ?\DateTime
    {
        return $this->salida_time_ida;
    }

    public function setSalidaTimeIda(\DateTime $salida_time_ida): static
    {
        $this->salida_time_ida = $salida_time_ida;

        return $this;
    }

    public function getLlegadaTimeIda(): ?\DateTime
    {
        return $this->llegada_time_ida;
    }

    public function setLlegadaTimeIda(\DateTime $llegada_time_ida): static
    {
        $this->llegada_time_ida = $llegada_time_ida;

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

    public function getSalidaTimeVuelta(): ?\DateTime
    {
        return $this->salida_time_vuelta;
    }

    public function setSalidaTimeVuelta(\DateTime $salida_time_vuelta): static
    {
        $this->salida_time_vuelta = $salida_time_vuelta;

        return $this;
    }

    public function getLlegadaTimeVuelta(): ?\DateTime
    {
        return $this->llegada_time_vuelta;
    }

    public function setLlegadaTimeVuelta(\DateTime $llegada_time_vuelta): static
    {
        $this->llegada_time_vuelta = $llegada_time_vuelta;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getProyecto(): ?Proyecto
    {
        return $this->proyecto;
    }

    public function setProyecto(?Proyecto $proyecto): static
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * @return Collection<int, Actividad>
     */
    public function getActividads(): Collection
    {
        return $this->actividads;
    }

    public function addActividad(Actividad $actividad): static
    {
        if (!$this->actividads->contains($actividad)) {
            $this->actividads->add($actividad);
            $actividad->setUser($this);
        }

        return $this;
    }

    public function removeActividad(Actividad $actividad): static
    {
        if ($this->actividads->removeElement($actividad)) {
            // set the owning side to null (unless already changed)
            if ($actividad->getUser() === $this) {
                $actividad->setUser(null);
            }
        }

        return $this;
    }
}
