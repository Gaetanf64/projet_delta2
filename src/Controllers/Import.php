<?php

namespace App\Controllers;

require ROOT . '/vendor/autoload.php';
require ROOT . 'src/config/ReadExcel.php';
require ROOT . 'src/models/RequireExcelManager.php';
require_once ROOT . 'src/Controllers/MainController.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\config\Readexcel;
use App\models\RequireExcelManager;
use App\Controllers\MainController;
use App\Entities\Fonctionnel;
use App\Entities\NotFonctionnel;
use App\Entities\Perimetre;
use App\Entities\Systeme;

class Import extends MainController
{
    /**
     * Afficher la page d'import
     */
    public function index()
    {
        $this->render('import', []);

        $inputFileType = 'Xlsx';
        $inputFileName = ROOT .'traceability-matrix.xlsx';


        $filterSubset = new Readexcel(8, 64, range('A', 'E'));

        $reader = IOFactory::createReader($inputFileType);


        $reader->setReadFilter($filterSubset);
        $spreadsheet = $reader->load($inputFileName);
        $activeRange = $spreadsheet->getActiveSheet()->calculateWorksheetDataDimension();
        $sheetData = $spreadsheet->getActiveSheet()->rangeToArray($activeRange, null, true, true, true);

        $data = [];
        $key = 0;

        foreach($sheetData as $ligne)
        {
            if($ligne['A'] != null)
            {
                $exigence = $ligne['A'];
                $data[$key]['exigence'] = $exigence;
            }
            if($ligne['B'] != null)
            {
                $description = $ligne['B'];
                $data[$key]['description'] = $description;
            }
            if($ligne['C'] != null)
            {
                $priorite = $ligne['C'];
                $data[$key]['priorite'] = $priorite;
            }
            if($ligne['D'] != null)
            {
                $flexibilite = $ligne['D'];
                $data[$key]['flexibilite'] = $flexibilite;
            }

            if($ligne['E'] != null)
            {
                if($ligne['A'] != null)
                {
                    $relation = $ligne['E'];
                    if(str_starts_with($exigence, 'ENF'))
                    {
                        for($i=7; $i<=count($data); $i++)
                        {
                            if($data[$i]['exigence'] == $relation)
                            {
                                array_push($data[$i]['relation'], $exigence);
                            }
                        }
                    } else
                    {
                        $data[$key]['relation'] = array($relation);
                    }
                } else
                {
                    $key--;
                    $relation = $ligne['E'];
                    if(str_starts_with($exigence, 'ENF'))
                    {
                        for($i=7; $i<=count($data); $i++)
                        {
                            if($data[$i]['exigence'] == $relation)
                            {
                                array_push($data[$i]['relation'], $exigence);
                            }
                        }
                    } else
                    {
                        array_push($data[$key]['relation'], $relation);
                    }
                }
            } 
            $key++;  
        }

        foreach($data as $value)
        {
            $importRequire = new RequireExcelManager($value['exigence']);
                
            if(str_starts_with($value['exigence'], 'EPDS'))
            {
                $newPerimetre = new Perimetre();
                $newPerimetre->setExigence($value['exigence']);
                $newPerimetre->setDescription($value['description']);

                $importRequire->importPerimetre($newPerimetre);
            }

            if(str_starts_with($value['exigence'], 'EEDS'))
            {
                $newSysteme = new Systeme();
                $newSysteme->setExigence($value['exigence']);
                $newSysteme->setDescription($value['description']);

                $importRequire->importEtatSystem($newSysteme);
            }

            if(str_starts_with($value['exigence'], 'ENF'))
            {   
                $newNotFonctionnel = new NotFonctionnel();
                $newNotFonctionnel->setExigence($value['exigence']);
                $newNotFonctionnel->setDescription($value['description']);
                $newNotFonctionnel->setFlexibilite($value['flexibilite']);

                $importRequire->importRequireNotFonction($newNotFonctionnel);
            }
        }

        foreach($data as $value)
        {
            if(str_starts_with($value['exigence'], 'EF'))
            {
                $lien_syst = $value['relation'][0];
                $lien_perim =  $value['relation'][1];
                $lien_notfonctionnel = $value['relation'][2];

                $id_perimetre = $importRequire->readId_perim($lien_perim);
                $id_systeme = $importRequire->readId_syst($lien_syst);
                $id_notfonctionnel = $importRequire->readId_notfonctionnel($lien_notfonctionnel);

                $newFonctionnel = new Fonctionnel();
                $newFonctionnel->setExigence($value['exigence']);
                $newFonctionnel->setDescription($value['description']);
                $newFonctionnel->setPriorite($value['priorite']);
                $newFonctionnel->setFlexibilite($value['flexibilite']);
                $newFonctionnel->setId_perimetre($id_perimetre);
                $newFonctionnel->setId_systeme($id_systeme);
                $newFonctionnel->setId_notfonctionnel($id_notfonctionnel);

                $importRequire->importRequireFonction($newFonctionnel);
            }
        }
    }
}



