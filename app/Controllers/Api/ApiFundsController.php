<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers\Api;

use App\Manipulators\FundManipulator;
use App\Services\FundsService;
use App\Services\LinkService;
use App\Transformers\ApiFundTransformer;

/**
 * Class WelcomeController.
 */
class ApiFundsController extends ApiController
{
    /**
     * @var FundManipulator
     */
    protected $fundManipulator;
    /**
     * @var LinkService
     */
    protected $linkService;
    /**
     * @var ApiFundTransformer
     */
    private $apifundsTransformer;

    /**
     * @var FundsService
     */
    private $fundsService;

    /**
     * fundsController constructor.
     */
    public function __construct()
    {
        $this->apifundsTransformer = new ApiFundTransformer();
        $this->fundsService = new FundsService();
        $this->linkService = new LinkService();
        $this->fundManipulator = new FundManipulator();
    }


    /**
     * @api            {get} api/v1/funds Get all funds
     * @apiPermission  none
     * @apiVersion     1.0.0
     * @apiName        GetFunds
     * @apiGroup       Funds
     * @apiDescription Fetch list, with funds.
     * @apiExample {curl} Example usage:
     *
     * curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET "http://diplohack.herokuapp.com/api/v1/funds"
     *
     * @apiSuccess {String[]} funds The array with funds.
     * @apiSuccess {String} title Title of funding.
     * @apiSuccess {String} description The description of a fund.
     * @apiSuccess {String[]} urls The array with urls.
     *
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data" :  [
     *              {
     *                  "title": "Funding Title",
     *                  "description": "Funding Description",
     *                  "url": [
     *                      {
     *                          "url1",
     *                          "url2",
     *                      }
     *                  ]
     *              },
     *              {
     *                  "title": "Funding Title 2",
     *                  "description": "Funding Description 2",
     *                  "url": [
     *                      {
     *                          "url1",
     *                          "url2",
     *                      }
     *                  ]
     *              }
     *          ],
     *      }
     */

    /**
     * Get all funds.
     *
     * @return string
     */
    public function get()
    {
        $funds = $this->fundsService->get();

        $funds = $this->fundManipulator->concatenateLinks($funds);

        return $this->respondWithSuccess(
            $this->apifundsTransformer->transformCollection($funds)
        );
    }

    /**
     * @api            {get} api/v1/funds/search?term={term} Search funds
     * @apiPermission  none
     * @apiVersion     1.0.0
     * @apiName        SearchFunds
     * @apiGroup       Funds
     * @apiDescription Fetch list, with funds.
     * @apiExample {curl} Example usage:
     *
     * curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X GET "http://diplohack.herokuapp.com/api/v1/funds/search?term=some-term"
     *
     * @apiParam {String} term The terms to search funds. required
     *
     * @apiSuccess {String[]} funds The array with funds.
     * @apiSuccess {String} title Title of funding.
     * @apiSuccess {String} description The description of a fund.
     * @apiSuccess {String[]} urls The array with urls.
     *
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          "data" :  [
     *              {
     *                  "title": "Funding Title",
     *                  "description": "Funding Description",
     *                  "url": [
     *                      {
     *                          "url1",
     *                          "url2",
     *                      }
     *                  ]
     *              },
     *              {
     *                  "title": "Funding Title 2",
     *                  "description": "Funding Description 2",
     *                  "url": [
     *                      {
     *                          "url1",
     *                          "url2",
     *                      }
     *                  ]
     *              }
     *          ],
     *      }
     * @apiError status_code HTTP Error Status Codes.
     * <a href='http://tools.ietf.org/html/rfc2616#section-10.4.5'>404 Not Found</a> |
     * <a href='https://tools.ietf.org/html/rfc4918#section-11.2'>422 Unprocessable Entity</a>
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 422 Unprocessable Entity
     *     {
     *          "error": {
     *              "message": "Parameter validation faileld.",
     *              "status_code": 422
     *          }
     *     }
     *
     */
    /**
     * Search all tables by user term.
     */
    public function search()
    {
        if (! isset($_GET['term'])) return $this->respondUnprocessableEntity();

        $funds = $this->fundsService->search($_GET['term']);

        var_dump($funds);
        exit;
        if ($funds === false) return $this->respondInternalServerError();

        $funds = $this->fundManipulator->concatenateLinks($funds);

        return $this->respondWithSuccess(
            $this->apifundsTransformer->transformCollection($funds)
        );
    }
}