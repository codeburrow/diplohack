<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Services;

use App\Kernel\DbManager;

/**
 * Class CategoryService.
 */
class CategoryService extends DbManager
{
    public function getAll()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`categories`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll();

        return $routes;
    }
}