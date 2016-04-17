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
class LinkDbService extends DbManager
{
    public function get()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`links`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $routes;
    }

    public function getByFundId($fundId)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`links` INNER JOIN fund_link ON fund_link.link_id = links.id WHERE fund_link.fund_id = :id ';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':id', $fundId, PDO::PARAM_INT);

        if (! $statement->execute()) {
            return false;
        }

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function findOrCreateByUrl($url)
    {
        if (false !== ($fund = $this->findByUrl($url))) {
            return $fund;
        }

        return $this->findById(
            $this->create(['url' => $url])
        );
    }

    public function findByUrl($url)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`links` WHERE `url` = :url';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':url', $url, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`links` WHERE `id` = :id';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = 'INSERT INTO `'.getenv('DB_NAME').'`.`links` (`url`, `description`) VALUES (:url, :description);';

        $url = $data['url'];
        $description = isset($data['description']) ? $data['description'] : null;

        $statement = $this->getConnection()->prepare($query);

        $statement->bindParam(':url', $url, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);

        $statement->execute();

        return $this->getConnection()->lastInsertId();
    }
}