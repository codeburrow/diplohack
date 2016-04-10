<?php namespace App\Services;

use App\Kernel\DbManager;
use Database;

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
//        $query =
//            "SELECT funds.title, f.funding_description, link.url "
//            "(SELECT content, title, 'msg' as type FROM messages WHERE content LIKE '%".
//            $term."%' OR title LIKE '%".$term."%')
//           UNION
//           (SELECT content, title, 'topic' as type FROM topics WHERE content LIKE '%".
//            $term."%' OR title LIKE '%".$term."%')
//           UNIOnN
//           (SELECT content, title, 'comment' as type FROM comments WHERE content LIKE '%".
//            $term."%' OR title LIKE '%".$term."%')";
    }
}

