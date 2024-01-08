<?php

namespace App\config;


require ROOT . 'vendor/autoload.php';


class Readexcel implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    private int $startRow = 0;

    private int $endRow = 0;

    private array $columns = [];

    public function __construct(int $startRow, int $endRow, array $columns)
    {
        $this->startRow = $startRow;
        $this->endRow = $endRow;
        $this->columns = $columns;
    }

    public function readCell($columnAddress, $row, $worksheetName = '')
    {
        if ($row >= $this->startRow && $row <= $this->endRow) {
            if (in_array($columnAddress, $this->columns)) {
                return true;
            }
        }

        return false;
    }
}

