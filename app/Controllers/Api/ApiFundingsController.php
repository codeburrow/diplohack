<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers\Api;
use App\Transformers\ApiFundingsTransformer;
use CodeBurrow\Services\FundingsService;

/**
 * Class WelcomeController.
 */
class ApiFundingsController extends ApiController
{
	/**
	 * @var ApiFundingsTransformer
	 */
	private $apiFundingsTransformer;

	/**
	 * @var FundingsService
	 */
	private $fundingsService;

	/**
	 * FundingsController constructor.
	 */
	public function __construct()
	{
		$this->apiFundingsTransformer = new ApiFundingsTransformer();
		$this->fundingsService = new FundingsService();
	}


	/**
	 * @return string
	 */
	public function getAll()
	{
		$fundings = $this->fundingsService->fetchAllFundings();

		if ( ! $fundings ) return $this->respondNoFound();

		return $this->respondWithSuccess(
			$this->apiFundingsTransformer->transformCollection($fundings)
		);

//		return $this->twig->render('welcome.twig', ['name' => 'Fabien']);
	}
}