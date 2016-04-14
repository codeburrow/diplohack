<?php namespace App\DbServices;

use App\Kernel\DbManager;
use Database;
use PDO;

class FundsDbService extends DbManager
{
    public function get()
    {
        $query = "
            SELECT funds.id, funds.title, funds.description, links.url
            FROM `" . getenv('DB_NAME') . "`.`funds`
            INNER JOIN fund_link ON fund_link.fund_id = funds.id
            INNER JOIN links ON fund_link.link_id = links.id;
            ";

        $statement = $this->getConnection()->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

    public function search($term)
    {
        $query = "
            SELECT DISTINCT funds.id, funds.title, funds.description, links.url
            FROM `" . getenv('DB_NAME') . "`.`funds`
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

        if (!$statement->execute()) {
            return false;
        }

        return $statement->fetchAll();
    }
}

