<?php namespace App\Services;

use App\Kernel\DbManager;
use Database;
use PDOException;

class FundingService extends DbManager
{
    
    public function fetchAllFundings()
    {
        $query_fundings = "
SELECT
  f.title, f.funding_description,
  l.url, l.link_description
FROM fundings              As f
INNER JOIN fundings_links AS fl ON fl.funding_id     = f.id
INNER JOIN links      AS  l ON fl.link_id = l.id;";

        try {
            $db = $this->getConnection();
            $stmt_fundings = $db->prepare($query_fundings);
            $result_fundings = $stmt_fundings->execute();
        } catch (PDOException $ex) {
            // For testing, you could use a die and message.
            //die("Failed to run query: " . $ex->getMessage());

            //or just use this use this one to product JSON data:
            $response["success"] = 0;
            $response["message"] = "Database Error. Please Try Again!";
            echo json_encode($response);
        }

        //fetching all the rows from the query
        return $row_fundings = $stmt_fundings->fetchAll();

    }
}

