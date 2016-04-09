<?php namespace App\Services;

use App\Kernel\DbManager;
use Database;

class FundingService extends DbManager
{

    public function fetchAllFundings()
    {
        $query = "
            SELECT fundings.title, fundings.description, links.url
            FROM fundings
            INNER JOIN funding_link ON funding_link.funding_id = fundings.id
            INNER JOIN links ON funding_link.link_id = links.id;
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
//            "SELECT fundings.title, f.funding_description, link.url "
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

