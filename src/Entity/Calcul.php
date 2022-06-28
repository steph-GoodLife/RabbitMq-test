<?php

namespace App\Entity;

use App\Repository\CalculRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalculRepository::class)]
class Calcul
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nombre1;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nombre2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre1(): ?string
    {
        return $this->Nombre1;
    }

    public function setNombre1(string $Nombre1): self
    {
        $this->Nombre1 = $Nombre1;

        return $this;
    }

    public function getNombre2(): ?string
    {
        return $this->Nombre2;
    }

    public function setNombre2(string $Nombre2): self
    {
        $this->Nombre2 = $Nombre2;

        return $this;
    }
}
