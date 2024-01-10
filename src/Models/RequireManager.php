<?php

namespace App\Models;


require ROOT . 'vendor/autoload.php';
require_once ROOT . 'src/config/Database.php';
require_once ROOT . 'src/Entities/Perimetre.php';
require_once ROOT . 'src/Entities/Systeme.php';
require_once ROOT . 'src/Entities/NotFonctionnel.php';
require_once ROOT . 'src/Entities/Fonctionnel.php';

use PDO;
use App\config\Database;
use App\Entities\Perimetre;
use App\Entities\Systeme;
use App\Entities\NotFonctionnel;
use App\Entities\Fonctionnel;


class RequireManager extends Database
{

    /**
     * Permet de lire tous les perimetres
     * 
     */
    public function readAllPerimetre()
    {
        $this->setDb();

        $perimetres = [];
        $req = $this->db->prepare(
            'SELECT * FROM perimetre'
        );
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($perimetre = $req->fetch(PDO::FETCH_ASSOC)) {

            // perimetres contiendra les données sous forme d'objets
            $perimetres[] = new Perimetre($perimetre);
        }
        return $perimetres;

        $req->closeCursor();
    }

    /**
     * Permet de lire tous les perimetres
     * 
     */
    public function readAllSysteme()
    {
        $this->setDb();

        $systemes = [];
        $req = $this->db->prepare(
            'SELECT * FROM systeme'
        );
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($systeme = $req->fetch(PDO::FETCH_ASSOC)) {

            // systemes contiendra les données sous forme d'objets
            $systemes[] = new Systeme($systeme);
        }
        return $systemes;

        $req->closeCursor();
    }

    /**
     * Permet de lire toutes les exigences fonctionnelles
     * 
     */
    public function readAllFonctionnel()
    {
        $this->setDb();

        $fonctionnels = [];
        $req = $this->db->prepare(
            'SELECT * FROM fonctionnel'
        );
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($fonctionnel = $req->fetch(PDO::FETCH_ASSOC)) {

            // fonctionnels contiendra les données sous forme d'objets
            $fonctionnels[] = new Fonctionnel($fonctionnel);
        }
        return $fonctionnels;

        $req->closeCursor();
    }

    /**
     * Permet de lire toutes les exigences non fonctionnelles
     * 
     */
    public function readAllNotFonctionnel()
    {
        $this->setDb();

        $notfonctionnels = [];
        $req = $this->db->prepare(
            'SELECT * FROM notfonctionnel'
        );
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($notfonctionnel = $req->fetch(PDO::FETCH_ASSOC)) {

            // notfonctionnels contiendra les données sous forme d'objets
            $notfonctionnels[] = new NotFonctionnel($notfonctionnel);
        }
        return $notfonctionnels;

        $req->closeCursor();
    }

    /**
     * Permet de lire le ID d'une exigence fonctionnelle
     * 
     */
    public function readIdFonctionnelle($exigence)
    {
        $this->setDb();

        $sql = $this->db->query("SELECT id FROM fonctionnel WHERE exigence = '$exigence' ");
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $id = $result['id'];

        return $id;
    }

    /**
     * Permet de lire le ID d'un perimetre
     * 
     */
    public function readIdPerimetre($exigence)
    {
        $this->setDb();

        $sql = $this->db->query("SELECT id FROM perimetre WHERE exigence = '$exigence' ");
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $id = $result['id'];

        return $id;
    }

    /**
     * Permet de lire le ID d'un systeme
     * 
     */
    public function readIdSysteme($exigence)
    {
        $this->setDb();

        $sql = $this->db->query("SELECT id FROM systeme WHERE exigence = '$exigence' ");
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $id = $result['id'];

        return $id;
    }

    /**
     * Permet de lire le ID d'une exigence non fonctionnelle
     * 
     */
    public function readIdNotFonctionnelle($exigence)
    {
        $this->setDb();

        $sql = $this->db->query("SELECT id FROM notfonctionnel WHERE exigence = '$exigence' ");
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $id = $result['id'];

        return $id;
    }

    /**
     * Permet de lire une exigence fonctionnelle
     * 
     */
    public function readFonctionnelle($exigence)
    {
        $this->setDb();

        $id = $this->readIdFonctionnelle($exigence);

        $sql = "SELECT * FROM fonctionnel WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $fonctionnelle = new Fonctionnel($data);

        return $fonctionnelle;
    }

    /**
     * Permet de lire un perimetre
     * 
     */
    public function readPerimetre($exigence)
    {
        $this->setDb();

        $id = $this->readIdFonctionnelle($exigence);

        $sql = "SELECT perimetre.description, perimetre.exigence FROM perimetre,fonctionnel WHERE fonctionnel.id = :id AND perimetre.id = fonctionnel.id_perimetre";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $perimetre = new Perimetre($data);

        return $perimetre;
    }

    /**
     * Permet de lire un systeme
     * 
     */
    public function readSysteme($exigence)
    {
        $this->setDb();

        $id = $this->readIdFonctionnelle($exigence);

        $sql = "SELECT systeme.description, systeme.exigence FROM systeme,fonctionnel WHERE fonctionnel.id = :id AND systeme.id = fonctionnel.id_systeme";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $systeme = new Systeme($data);

        return $systeme;
    }

    /**
     * Permet de lire une exigence non fonctionnelle
     * 
     */
    public function readNotFonctionnelle($exigence)
    {
        $this->setDb();

        $id = $this->readIdFonctionnelle($exigence);

        $sql = "SELECT notfonctionnel.description, notfonctionnel.flexibilite, notfonctionnel.exigence FROM notfonctionnel,fonctionnel WHERE fonctionnel.id = :id AND notfonctionnel.id = fonctionnel.id_notfonctionnel";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $notfonctionnelle = new NotFonctionnel($data);

        return $notfonctionnelle;
    }

    /**
     * Permet de lire toutes les exigences fonctionnelles en limitant à 5
     * 
     */
    public function readSubstrFonctionnelle()
    {
        $this->setDb();

        $fonctionnels = [];
        $req = $this->db->prepare(
            'SELECT exigence, description FROM fonctionnel LIMIT 5'
        );
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($fonctionnel = $req->fetch(PDO::FETCH_ASSOC)) {

            // fonctionnelles contiendra les données sous forme d'objets
            $fonctionnels[] = new Fonctionnel($fonctionnel);
        }
        return $fonctionnels;

        $req->closeCursor();
    }

    /**
     * Permet de lire toutes les exigences non fonctionnelles en limitant à 5
     * 
     */
    public function readSubstrNotFonctionnelle()
    {
        $this->setDb();

        $notfonctionnels = [];
        $req = $this->db->prepare(
            'SELECT exigence, description FROM notfonctionnel LIMIT 5'
        );
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($notfonctionnel = $req->fetch(PDO::FETCH_ASSOC)) {

            // notfonctionnelles contiendra les données sous forme d'objets
            $notfonctionnels[] = new NotFonctionnel($notfonctionnel);
        }
        return $notfonctionnels;

        $req->closeCursor();
    }

    /**
     * Permet de lister les exigences fonctionnelles par Perimetre
     * 
     */
    public function readFonctionnelleByPerimetre($exigence)
    {
        $this->setDb();

        $fonctionnels = [];
        $id = $this->readIdPerimetre($exigence);

        $sql = "SELECT fonctionnel.exigence, fonctionnel.description, fonctionnel.priorite, fonctionnel.flexibilite FROM fonctionnel, perimetre WHERE perimetre.id = :id AND perimetre.id = fonctionnel.id_perimetre";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($fonctionnel = $req->fetch(PDO::FETCH_ASSOC)) {

            // fonctionnels contiendra les données sous forme d'objets
            $fonctionnels[] = new Fonctionnel($fonctionnel);
        }
        return $fonctionnels;
    }

    /**
    * Permet de lister les exigences fonctionnelles par Systeme
    * 
    */
    public function readFonctionnelleBySysteme($exigence)
    {
        $this->setDb();

        $fonctionnels = [];
        $id = $this->readIdSysteme($exigence);

        $sql = "SELECT fonctionnel.exigence, fonctionnel.description, fonctionnel.priorite, fonctionnel.flexibilite FROM fonctionnel, systeme WHERE systeme.id = :id AND systeme.id = fonctionnel.id_systeme";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();

        //on crée la variable data qui
        //va contenir les données
        while ($fonctionnel = $req->fetch(PDO::FETCH_ASSOC)) {

            // fonctionnels contiendra les données sous forme d'objets
            $fonctionnels[] = new Fonctionnel($fonctionnel);
        }
        return $fonctionnels;
    }

    /**
    * Permet de lister les exigences fonctionnelles par les exigences Non Fonctionnelles
    * 
    */
    public function readFonctionnelleByNotFonctionnelle($exigence)
    {
        $this->setDb();

        $fonctionnels = [];
        $id = $this->readIdNotFonctionnelle($exigence);

        $sql = "SELECT fonctionnel.exigence, fonctionnel.description, fonctionnel.priorite, fonctionnel.flexibilite FROM fonctionnel, notfonctionnel WHERE notfonctionnel.id = :id AND notfonctionnel.id = fonctionnel.id_notfonctionnel";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();

       

        //on crée la variable data qui
        //va contenir les données
        while ($fonctionnel = $req->fetch(PDO::FETCH_ASSOC)) {

            // fonctionnels contiendra les données sous forme d'objets
            $fonctionnels[] = new Fonctionnel($fonctionnel);
        }
        return $fonctionnels;
    }
}