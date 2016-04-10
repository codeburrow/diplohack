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
     * Incorporate many links to array, and attach this array to corresponding fund.
     *
     * @param $funds
     * @return array
     */
    public function concatenateLinks($funds)
    {
        foreach ($funds as $fund) {
            $fundId = $fund['id'];

            if (! isset($newFunds[$fundId])) {
                $newFunds[$fundId] = $fund;
                $newFunds[$fundId]['urls'] = [];
            }

            array_push($newFunds[$fundId]['urls'], $fund['url']);
            unset($newFunds[$fundId]['url']);
        }

        return $newFunds;
    }
}