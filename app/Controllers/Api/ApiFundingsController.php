<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers;

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
	 * FundingsController constructor.
	 */
	public function __construct()
	{
		$this->apiFundingsTransformer = new ApiFundingsTransformer();
	}


	/**
	 * @return string
	 */
	public function getAll()
	{
		$this->postCoordinatesRequest->validate();

		$location = $this->postCoordinatesRequest->getLocation();

		$coordinates = $this->coordinatesService->getCoordinates($location);

		if ( ! $coordinates ) return $this->respondNoCoordinates();

		return $this->respondWithSuccess(
			$this->apiCoordinatesTransformer->transform($coordinates)
		);

//		return $this->twig->render('welcome.twig', ['name' => 'Fabien']);
	}
}