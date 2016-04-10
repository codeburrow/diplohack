<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Services;

use App\Kernel\DbManager;
use PDO;

/**
 * Class DistrictService.
 */
class LinkService extends DbManager
{
    public function get()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`links`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll();

        return $routes;
    }

    public function getByFundId($fundId)
    {
        $query = 'SELECT url FROM `'.getenv('DB_NAME').'`.`links` INNER JOIN fund_link ON fund_link.link_id = links.id WHERE fund_link.fund_id = :id ';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':id', $fundId, PDO::PARAM_INT);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll();

        return $routes;
    }
}