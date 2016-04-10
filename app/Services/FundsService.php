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
            WHERE funds.title LIKE :term OR funds.description LIKE :term OR links.url LIKE :term;
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

