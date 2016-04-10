<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Manipulators;

use App\Services\LinkService;
use App\Transformers\LinkOnlyTransformer;

/**
 * Class FundingManipulator.
 */
class FundManipulator
{
    protected $linkService;
    protected $linkOnlyTransformer;

    public function __construct()
    {
        $this->linkService = new LinkService();
        $this->linkOnlyTransformer = new LinkOnlyTransformer();
    }

    /**
     * Incorporate many links to array, and attach this array to corresponding fund.
     *
     * @param $funds
     * @return array
     */
    public function concatenateLinks($funds)
    {
        $newFunds = [];

        foreach ($funds as $fund) {
            unset($fund['url']);
            $fund['urls'] = $this->linkOnlyTransformer->transformCollection($this->linkService->getByFundId($fund['id']));
            $newFunds[$fund['id']] = $fund;
        }

        return $newFunds;

//        foreach ($funds as $fund) {
//            $fundId = $fund['id'];
//
//            if (! isset($newFunds[$fundId])) {
//                $newFunds[$fundId] = $fund;
//                $newFunds[$fundId]['urls'] = [];
//            }
//
//            array_push($newFunds[$fundId]['urls'], $fund['url']);
//            unset($newFunds[$fundId]['url']);
//        }

        return $newFunds;
    }
}