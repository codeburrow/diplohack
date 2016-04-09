<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers;

/**
 * Class WelcomeController.
 */
class ApiFundingsController extends Controller
{
	/**
	 * @return string
	 */
	public function getAll()
	{
		return $this->twig->render('welcome.twig', ['name' => 'Fabien']);
	}
}