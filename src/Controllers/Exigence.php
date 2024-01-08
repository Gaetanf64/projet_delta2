<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\RequireManager;

require_once ROOT . 'src/Controllers/MainController.php';
require_once ROOT . 'src/Models/RequireManager.php';

class Exigence extends MainController
{
    /**
     * Afficher la page du perimetre
     */
    public function perimetre()
    {
        $perimetreManager = new RequireManager();
        $perimetres = $perimetreManager->readAllPerimetre();
        $this->render('pages/perimetre', ['perimetres' => $perimetres]);
    }

    /**
     * Afficher la page du systeme
     */
    public function systeme()
    {
        $systemeManager = new RequireManager();
        $systemes = $systemeManager->readAllSysteme();
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
    }

    /**
     * Afficher la page des exigences non fonctionnelles
     */
    public function notfonctionnel()
    {
        $notfonctionnelManager = new RequireManager();
        $notfonctionnelles = $notfonctionnelManager->readAllNotFonctionnel();
        $this->render('pages/notfonctionnel', ['notfonctionnelles' => $notfonctionnelles]);
    }

    /**
     * Afficher la page de détail d'une exigence
     */
    public function detail($id)
    {
        $detailManager = new RequireManager();
        $fonctionnelle = $detailManager->readFonctionnelle($id);
        $perimetre = $detailManager->readPerimetre($id);
        $systeme = $detailManager->readSysteme($id);
        $notfonctionnelle = $detailManager->readNotFonctionnelle($id);

        $this->render('pages/detail', ['fonctionnelle' => $fonctionnelle, 'perimetre' => $perimetre, 'systeme' => $systeme, 'notfonctionnelle' => $notfonctionnelle]);
    }
}