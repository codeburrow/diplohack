<?php namespace App\Services;

use App\Kernel\DbManager;
use Database;
use PDO;

class FundsService extends DbManager
{
    public function get()
    {
        $query = "
            SELECT funds.id, funds.title, funds.description, links.url
            FROM `".getenv('DB_NAME')."`.`funds`
            INNER JOIN fund_link ON fund_link.fund_id = funds.id
            INNER JOIN links ON fund_link.link_id = links.id;
            ";

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        return $statement->fetchAll();
    }

    public function search($term)
    {
        $query = "
            SELECT funds.id, funds.title, funds.description, links.url
            FROM `".getenv('DB_NAME')."`.`funds`
            INNER JOIN fund_link ON fund_link.fund_id = funds.id
            INNER JOIN links ON fund_link.link_id = links.id
            INNER JOIN area_fund ON area_fund.fund_id = funds.id
            INNER JOIN areas ON area_fund.area_id = areas.id
            INNER JOIN category_fund ON category_fund.fund_id = funds.id
            INNER JOIN categories ON category_fund.category_id = categories.id
            OR areas.name LIKE :term OR areas.description LIKE :term ;
            OR categories.name LIKE :term OR categories.description LIKE :term ;
            ";

        $statement = $this->getConnection()->prepare($query);
        $likeTerm = "%{$term}%";
        $statement->bindParam(':term', $likeTerm, PDO::PARAM_STR);

        if (! $statement->execute()) {
            return false;
        }

        return $statement->fetchAll();
    }
}

