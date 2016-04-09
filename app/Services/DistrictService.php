<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Services;

/**
 * Class DistrictService.
 */
class DistrictService
{
    public function getAll()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`districts`';

        $statement = $this->getDbConnection()->prepare($query);
       
        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll();

        return $routes;
    }
}