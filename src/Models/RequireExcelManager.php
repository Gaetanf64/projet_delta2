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


class RequireExcelManager extends Database
{
    private $data;

    public function __construct($exigence)
    {
        $this->setDb();

        $check = "SELECT perimetre.exigence, systeme.exigence, fonctionnel.exigence, notfonctionnel.exigence FROM perimetre, systeme, fonctionnel, notfonctionnel WHERE perimetre.exigence = '$exigence' OR systeme.exigence = '$exigence' OR fonctionnel.exigence = '$exigence' OR notfonctionnel.exigence = '$exigence' ";

        $result = $this->db->prepare($check);
        $result->execute();

        $this->data = $result->fetch(PDO::FETCH_ASSOC);
    }

    public function importPerimetre($perimetre)
    {
        if($this->data != false)
        {
            $sql = "UPDATE perimetre SET description = :description WHERE exigence = :exigence ";
            $req = $this->db->prepare($sql);
            $req->bindValue('description', $perimetre->getDescription(), PDO::PARAM_STR);
            $req->bindValue('exigence', $perimetre->getExigence(), PDO::PARAM_STR);
            $req->execute();
        } else
        {
            $sql = "INSERT INTO perimetre (exigence, description)
            VALUES (:exigence, :description)";
            $req = $this->db->prepare($sql);
            $req->bindValue('exigence', $perimetre->getExigence(), PDO::PARAM_STR);
            $req->bindValue('description', $perimetre->getDescription(), PDO::PARAM_STR);
            $req->execute();
        }
    }

    public function importEtatSystem($systeme)
    {
        if($this->data != false)
        {
            $sql = "UPDATE systeme SET description = :description WHERE exigence = :exigence ";
            $req = $this->db->prepare($sql);
            $req->bindValue('description', $systeme->getDescription(), PDO::PARAM_STR);
            $req->bindValue('exigence', $systeme->getExigence(), PDO::PARAM_STR);
            $req->execute();
        } else
        {
            $sql = "INSERT INTO systeme (exigence, description)
            VALUES (:exigence, :description)";
            $req = $this->db->prepare($sql);
            $req->bindValue('exigence', $systeme->getExigence(), PDO::PARAM_STR);
            $req->bindValue('description', $systeme->getDescription(), PDO::PARAM_STR);
            $req->execute();
        }
    }

    public function importRequireNotFonction($notfonctionnel)
    {
        if($this->data != false)
        {
            $sql = "UPDATE notfonctionnel SET description = :description, flexibilite = :flexibilite WHERE exigence = :exigence ";
            $req = $this->db->prepare($sql);
            $req->bindValue('description', $notfonctionnel->getDescription(), PDO::PARAM_STR);
            $req->bindValue('exigence', $notfonctionnel->getExigence(), PDO::PARAM_STR);
            $req->bindValue('flexibilite', $notfonctionnel->getFlexibilite(), PDO::PARAM_STR);
            $req->execute();
        } else
        {
            $sql = "INSERT INTO notfonctionnel (exigence, description, flexibilite)
            VALUES (:exigence, :description, :flexibilite)";
            $req = $this->db->prepare($sql);
            $req->bindValue('exigence', $notfonctionnel->getExigence(), PDO::PARAM_STR);
            $req->bindValue('description', $notfonctionnel->getDescription(), PDO::PARAM_STR);
            $req->bindValue('flexibilite', $notfonctionnel->getFlexibilite(), PDO::PARAM_STR);
            $req->execute();
        }
    }

    public function importRequireFonction($fonctionnel)
    {
        if($this->data != false)
        {
            $sql = "UPDATE fonctionnel SET description = :description, priorite = :priorite, flexibilite = :flexibilite, id_perimetre = :id_perimetre, id_systeme = :id_systeme, id_notfonctionnel = :id_notfonctionnel WHERE exigence = :exigence ";
            $req = $this->db->prepare($sql);
            $req->bindValue('description', $fonctionnel->getDescription(), PDO::PARAM_STR);
            $req->bindValue('exigence', $fonctionnel->getExigence(), PDO::PARAM_STR);
            $req->bindValue('priorite', $fonctionnel->getPriorite(), PDO::PARAM_STR);
            $req->bindValue('flexibilite', $fonctionnel->getFlexibilite(), PDO::PARAM_STR);
            $req->bindValue('id_perimetre', $fonctionnel->getId_perimetre(), PDO::PARAM_INT);
            $req->bindValue('id_systeme', $fonctionnel->getId_systeme(), PDO::PARAM_INT);
            $req->bindValue('id_notfonctionnel', $fonctionnel->getId_notfonctionnel(), PDO::PARAM_INT);
            $req->execute();
        } else
        {
            $sql = "INSERT INTO fonctionnel (exigence, description, priorite, flexibilite, id_perimetre, id_systeme, id_notfonctionnel)
            VALUES (:exigence, :description, :priorite, :flexibilite, :id_perimetre, :id_systeme, :id_notfonctionnel)";
            $req = $this->db->prepare($sql);
            $req->bindValue('exigence', $fonctionnel->getExigence(), PDO::PARAM_STR);
            $req->bindValue('description', $fonctionnel->getDescription(), PDO::PARAM_STR);
            $req->bindValue('priorite', $fonctionnel->getPriorite(), PDO::PARAM_STR);
            $req->bindValue('flexibilite', $fonctionnel->getFlexibilite(), PDO::PARAM_STR);
            $req->bindValue('id_perimetre', $fonctionnel->getId_perimetre(), PDO::PARAM_INT);
            $req->bindValue('id_systeme', $fonctionnel->getId_systeme(), PDO::PARAM_INT);
            $req->bindValue('id_notfonctionnel', $fonctionnel->getId_notfonctionnel(), PDO::PARAM_INT);
            $req->execute();
        }
    }

    public function readId_perim($lien_perim)
    {
        $recup_id_perimetre = $this->db->query("SELECT id FROM perimetre WHERE exigence = '$lien_perim' ");
        
        $id_perimetre = $recup_id_perimetre->fetch(PDO::FETCH_ASSOC);

        $id_p = $id_perimetre['id'];

        return $id_p;
    }

    public function readId_syst($lien_syst)
    {
        $recup_id_systeme = $this->db->query("SELECT id FROM systeme WHERE exigence = '$lien_syst' ");
        $id_systeme = $recup_id_systeme->fetch(PDO::FETCH_ASSOC);

        $id_s = $id_systeme['id'];
       
        return $id_s;

    }

    public function readId_notfonctionnel($lien_notfonctionnel)
    {
        $recup_id_notfonctionnel = $this->db->query("SELECT id FROM notfonctionnel WHERE exigence = '$lien_notfonctionnel' ");
        $id_notfonctionnel = $recup_id_notfonctionnel->fetch(PDO::FETCH_ASSOC);

        $id_n = $id_notfonctionnel['id'];

        return $id_n;
    }
}
