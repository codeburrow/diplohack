<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers;

use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class Controller.
 */
abstract class Controller
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views');
        $this->twig = new Twig_Environment($loader, [
            'cache' => __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'cache',
        ]);
    }
}