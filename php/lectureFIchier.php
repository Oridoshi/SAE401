<?php
    require '../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\IOFactory;

    function lectureFichier($path){
        $spreadsheet = IOFactory::load($path);

        $worksheet = $spreadsheet->getActiveSheet();

        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);


        $values = array();
        for ($row = 1; $row <= $highestRow; ++$row) {
            $values[$row - 1] = array();
            for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                $value = $worksheet->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col) . $row)->getValue();
                $value = str_replace("⚠️", "", $value);
                $values[$row - 1][$col-1] = $value;
            }
        }

        unlink($path);
        
        return $values;
    }