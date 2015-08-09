<?php

namespace SalesPayroll\Formatters;

use Exception;

class CSVFormatter implements Formatter
{
    public function create($fileName, $data)
    {
        $fileName .= '.csv';
        try
        {
            $fp = fopen($fileName, "w");
            foreach ($data as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
        } catch ( Exception $e ) {
            return false;
        }

        return true;
    }
}