<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers;
use App\Manipulators\FundManipulator;
use App\DbServices\FundDbService;
use App\Transformers\ApiGetFundTransformer;


/**
 * Class WelcomeController.
 */
class WelcomeController extends Controller
{
    protected  $fundsService;
    private $fundsTransformer;
    private $fundManipulator;

    public function __construct(){

	    parent::__construct();
        $this->fundsService = new FundDbService();
        $this->fundsTransformer = new ApiGetFundTransformer();
        $this->fundManipulator = new FundManipulator();
    }

    /**
     * @return string
     */
    public function search()
    {
        $funds = $this->fundsService->get();

        $funds = $this->fundManipulator->concatenateLinks($funds);

        $results = $this->fundsTransformer->transformCollection($funds);

        return $this->twig->render('search.twig', ['results' => $results]);
    }

    public function welcome()
    {
        return $this->twig->render('welcome.twig');
    }
}