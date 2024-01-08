<?php

namespace App\Controllers;

use PDO;
use App\config\Database;

require_once ROOT . 'src/config/Database.php';

abstract class MainController
{
    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function render(string $fichier, array $data = [])
    {
        extract($data);

        // // On démarre le buffer de sortie
        ob_start();

        // Template de page
        require_once ROOT . 'src/Views/' . $fichier . '.php';
    }
}