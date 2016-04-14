<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\DbServices;

use App\Kernel\DbManager;
use PDO;

/**
 * Class DistrictService.
 */
class AreaDbService extends DbManager
{
    public function get()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`areas`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll();

        return $routes;
    }


    public function findByName($name)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`areas` WHERE `name` = :name';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}