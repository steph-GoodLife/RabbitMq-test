<?php

namespace App\DTO;

class AdditionDto implements AdditionInterface
{
    private ?int $Nombre1;

    private ?int $Nombre2;

    /**
     * Get the value of Nombre1
     */ 
    public function getNombre1()
    {
        return $this->Nombre1;
    }

    /**
     * Set the value of Nombre1
     *
     * @return  self
     */ 
    public function setNombre1($Nombre1)
    {
        $this->Nombre1 = $Nombre1;

        return $this;
    }

    /**
     * Get the value of Nombre2
     */ 
    public function getNombre2()
    {
        return $this->Nombre2;
    }

    /**
     * Set the value of Nombre2
     *
     * @return  self
     */ 
    public function setNombre2($Nombre2)
    {
        $this->Nombre2 = $Nombre2;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}