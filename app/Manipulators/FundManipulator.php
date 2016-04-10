<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Manipulators;

/**
 * Class FundingManipulator.
 */
class FundManipulator
{
    /**
     * Each funding as an id.
     *
     * @param $data
     * @return array
     */
    public function simplify($data)
    {
        $funds = [];

        foreach ($data['funds'] as $fund) {
            if ($key = array_search($fund['id'], $data['urls'])) {
                $fund['urls'] = $data['urls'][$key];
//               $funds =
            }
        }

        return $funds;
    }
}