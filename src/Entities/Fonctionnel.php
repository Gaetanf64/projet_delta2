<?php

namespace App\Entities;


class Fonctionnel
{
    protected $id;
    protected $exigence;
    protected $description;
    protected $flexibilite;
    protected $priorite;
    protected $id_perimetre;
    protected $id_systeme;
    protected $id_notfonctionnel;

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

    public function setPriorite(String $priorite)
    {
        $this->priorite = $priorite;
        return $this;
    }

    public function setId_perimetre(Int $id_perimetre)
    {

        if ($id_perimetre > 0) {
            $this->id_perimetre = $id_perimetre;
        }
        return $this;
    }

    public function setId_systeme(Int $id_systeme)
    {
        if ($id_systeme > 0) {
            $this->id_systeme = $id_systeme;
        }
        return $this;
    }

    public function setId_notfonctionnel(Int $id_notfonctionnel)
    {
        if ($id_notfonctionnel > 0) {
            $this->id_notfonctionnel = $id_notfonctionnel;
        }
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

    public function getPriorite()
    {
        return $this->priorite;
    }

    public function getId_perimetre()
    {
        return $this->id_perimetre;
    }

    public function getId_systeme()
    {
        return $this->id_systeme;
    }

    public function getId_notfonctionnel()
    {
        return $this->id_notfonctionnel;
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