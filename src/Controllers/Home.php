<?php

namespace App\Controllers;

use App\Controllers\MainController;

require_once ROOT . 'src/Controllers/MainController.php';

class Home extends MainController
{
    /**
     * Afficher la page d'accueil
     */
    public function home()
    {
        $this->render('home');
    }
}