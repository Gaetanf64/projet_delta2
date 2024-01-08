<?php

namespace App\Entities;


class Perimetre
{
    protected $id;
    protected $exigence;
    protected $description;

    public function __construct($data = false)
    {
        if (is_array($data)) {
            $this->hydrate($data);
        }
    }

    public function setExigence(String $exigence)
    {
        $this->exigence = ucfirst($exigence);
        return $this;
    }

    public function setDescription(String $description)
    {
        $this->description = $description;
        return $this;
    }

    public function setId(Int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getExigence()
    {
        return $this->exigence;
    }

    public function getDescription()
    {
        return $this->description;
    }

    private function hydrate($data)
    {
        // Boucle sur tous les champs et valeurs
        foreach ($data as $key => $value) {
            // Construit le title de la méthode grace 
            // au title des champs de le DB
            $methodName = 'set' . ucfirst($key);

            // Si la méthode existe
            if (method_exists($this, $methodName)) {
                // Appel de la méthode
                $this->$methodName($value);
            }
        }
    }
}