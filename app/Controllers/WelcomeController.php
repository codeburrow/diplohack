<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers;

/**
 * Class WelcomeController.
 */
class WelcomeController extends Controller
{
    /**
     * @return string
     */
    public function search()
    {
        return $this->twig->render('search.twig', ['name' => 'Fabien']);
    }

    public function welcome()
    {
        return $this->twig->render('welcome.twig');
    }
}