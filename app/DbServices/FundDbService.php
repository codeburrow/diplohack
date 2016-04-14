<?php namespace App\DbServices;

use App\Kernel\DbManager;
use Database;
use PDO;

/**
 * Class FundDbService.
 */
class FundDbService extends DbManager
{
    /**
     * @return array
     */
    public function get()
    {
        $query = "
            SELECT funds.id, funds.title, funds.description, links.url
            FROM `".getenv('DB_NAME')."`.`funds`
            INNER JOIN fund_link ON fund_link.fund_id = funds.id
            INNER JOIN links ON fund_link.link_id = links.id;
            ";

        $statement = $this->getConnection()->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @param $term
     * @return array|bool
     */
    public function search($term)
    {
        $query = "
            SELECT DISTINCT funds.id, funds.title, funds.description, links.url
            FROM `".getenv('DB_NAME')."`.`funds`
            INNER JOIN fund_link ON fund_link.fund_id = funds.id
            INNER JOIN links ON fund_link.link_id = links.id
            INNER JOIN area_fund ON area_fund.fund_id = funds.id
            INNER JOIN areas ON area_fund.area_id = areas.id
            INNER JOIN category_fund ON category_fund.fund_id = funds.id
            INNER JOIN categories ON category_fund.category_id = categories.id
            INNER JOIN funds_profile ON funds_profile.funding_id = funds.id
            INNER JOIN profiles ON funds_profile.profile_id = profiles.id
            WHERE funds.title LIKE :term OR funds.description LIKE :term OR links.url LIKE :term 
            OR areas.name LIKE :term OR areas.description LIKE :term 
            OR categories.name LIKE :term OR categories.description LIKE :term 
            OR profiles.name LIKE :term OR profiles.description LIKE :term ;
            ";

        $statement = $this->getConnection()->prepare($query);
        $likeTerm = "%{$term}%";
        $statement->bindParam(':term', $likeTerm, PDO::PARAM_STR);

        if (! $statement->execute()) {
            return false;
        }

        return $statement->fetchAll();
    }

    /**
     * @param $title
     * @return mixed
     */
    public function findOrCreateByTitle($title)
    {
        if (false !== ($fund = $this->findByTitle($title))) {
            return $fund;
        }

        return $this->findById(
            $this->create(['title' => $title])
        );
    }

    /**
     * @param $title
     * @return mixed
     */
    public function findByTitle($title)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`funds` WHERE `title` = :title';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`funds` WHERE `id` = :id';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $data
     * @return string
     */
    public function create($data)
    {
        $query = 'INSERT INTO `'.getenv('DB_NAME').'`.`funds` (`title`, `description`) VALUES (:title, :description);';

        $title = $data['title'];
        $description = isset($data['description']) ? $data['description'] : null;

        $statement = $this->getConnection()->prepare($query);

        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);

        $statement->execute();

        return $this->getConnection()->lastInsertId();
    }

    /**
     * @param $fundId
     * @param $areaId
     * @return bool
     */
    public function assignAreaById($fundId, $areaId)
    {
        $query = 'INSERT INTO `'.getenv('DB_NAME').'`.`area_fund` (`area_id`, `fund_id`) VALUES (:areaId, :fundId);';

        $statement = $this->getConnection()->prepare($query);

        $statement->bindParam(':fundId', $fundId, PDO::PARAM_INT);
        $statement->bindParam(':areaId', $areaId, PDO::PARAM_INT);

        return $statement->execute();
    }
}

