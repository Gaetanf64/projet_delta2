<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\RequireManager;

require_once ROOT . 'src/Controllers/MainController.php';
require_once ROOT . 'src/Models/RequireManager.php';

class Exigence extends MainController
{
    //public $param;

    /**
     * Afficher la page du perimetre
     */
    public function perimetre()
    {
        $perimetreManager = new RequireManager();
        $perimetres = $perimetreManager->readAllPerimetre();

        if(!isset($_SESSION))
        {
            session_start();
        }
        $_SESSION['page'] = "perimetre";

        $this->render('pages/perimetre', ['perimetres' => $perimetres]);
    }

    /**
     * Afficher la page du systeme
     */
    public function systeme()
    {
        $systemeManager = new RequireManager();
        $systemes = $systemeManager->readAllSysteme();

        if(!isset($_SESSION))
        {
            session_start();
        }
        $_SESSION['page'] = "systeme";

        $this->render('pages/systeme', ['systemes' => $systemes]);
    }

    /**
     * Afficher la page des exigences fonctionnelles
     */
    public function fonctionnel()
    {
        $fonctionnelManager = new RequireManager();
        $fonctionnelles = $fonctionnelManager->readAllFonctionnel();
        $this->render('pages/fonctionnel', ['fonctionnelles' => $fonctionnelles]);

        session_destroy();
    }

    /**
     * Afficher la page des exigences non fonctionnelles
     */
    public function notfonctionnel()
    {
        $notfonctionnelManager = new RequireManager();
        $notfonctionnelles = $notfonctionnelManager->readAllNotFonctionnel();

        if(!isset($_SESSION))
        {
            session_start();
        }
        $_SESSION['page'] = "notfonctionnel";

        $this->render('pages/notfonctionnel', ['notfonctionnelles' => $notfonctionnelles]);
    }

    /**
     * Afficher la page de détail d'une exigence
     */
    public function detail($exigence)
    {
        $detailManager = new RequireManager();
        $fonctionnelle = $detailManager->readFonctionnelle($exigence);
        $perimetre = $detailManager->readPerimetre($exigence);
        $systeme = $detailManager->readSysteme($exigence);
        $notfonctionnelle = $detailManager->readNotFonctionnelle($exigence);

        $this->render('pages/detail', ['fonctionnelle' => $fonctionnelle, 'perimetre' => $perimetre, 'systeme' => $systeme, 'notfonctionnelle' => $notfonctionnelle]);
    }

    /**
     * Afficher la page des data views
     */
    public function data()
    {
        $dataManager = new RequireManager();
        $fonctionnelles = $dataManager->readSubstrFonctionnelle();
        $perimetres = $dataManager->readAllPerimetre();
        $systemes = $dataManager->readAllSysteme();
        $notfonctionnelles = $dataManager->readSubstrNotFonctionnelle();

        $this->render('data', ['fonctionnelles' => $fonctionnelles, 'perimetres' => $perimetres, 'systemes' => $systemes, 'notfonctionnelles' => $notfonctionnelles]);
    }

    /**
     * Afficher la liste des dependances
     */
    public function liste($exigence)
    {
        $listeManager = new RequireManager();
        
        if($_SESSION['page'] == "perimetre")
        {
            $fonctionnelles = $listeManager->readFonctionnelleByPerimetre($exigence);
        }
        if($_SESSION['page'] == "systeme")
        {
            $fonctionnelles = $listeManager->readFonctionnelleBySysteme($exigence);
        }
        if($_SESSION['page'] == "notfonctionnel")
        {
            $fonctionnelles = $listeManager->readFonctionnelleByNotFonctionnelle($exigence);
        }

        $this->render('pages/liste', ['fonctionnelles' => $fonctionnelles]);
    }
}