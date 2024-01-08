<?php

namespace App\Entities;


class NotFonctionnel
{
    protected $id;
    protected $exigence;
    protected $description;
    protected $flexibilite;

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

    public function setFlexibilite(String $flexibilite)
    {
        $this->flexibilite = $flexibilite;
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

    public function getFlexibilite()
    {
        return $this->flexibilite;
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