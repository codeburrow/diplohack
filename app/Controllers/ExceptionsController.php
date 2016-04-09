<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers;

/**
 * Class ExceptionsController.
 */
class ExceptionsController extends Controller
{
    /**
     * @return string
     */
    public function notFound()
    {
        return '404';
    }
}