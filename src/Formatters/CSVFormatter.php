<?php

namespace SalesPayroll\Formatters;

use Exception;

class CSVFormatter implements FormatterInterface
{
    /**
     * @param $fileName String
     * @param $data     Array with PaymentDay value objects
     *
     * @return bool
     */
    public function create($fileName, $data)
    {
        $fileName .= '.csv';
        try
        {
            $fp = fopen($fileName, "w");
            fputcsv($fp, ['Month name', 'Salary Payment Date', 'Bonus Payment Date']);
            foreach ($data as $paymentDay) {
                fputcsv($fp, $paymentDay->getAsArray());
            }
            fclose($fp);
        } catch ( Exception $e ) {
            return false;
        }

        return true;
    }
}