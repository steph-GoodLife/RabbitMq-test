<?php

namespace App\Message;

//Création de l'enveloppe et sa description 

class AdditionNotification
{
    private $addition;

    public function __construct(string $addition)
    {
        $this->addition = $addition;
    }

    public function getAddition(): string
    {
        return $this->addition;
    }
}
