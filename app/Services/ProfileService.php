<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Services;

use App\Kernel\DbManager;

/**
 * Class DistrictService.
 */
class ProfileService extends DbManager
{
    public function get()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`profiles`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll();

        return $routes;
    }
}