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
  f.title, f.description,
  l.url, l.description
FROM fundings              As f
INNER JOIN fundings_links AS fl ON fl.funding_id     = f.id
INNER JOIN links      AS  l ON fl.link_id = l.id;";

        try {
            $db = $this->fetchAllFundings();
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
        $row_fundings = $stmt_fundings->fetchAll();

        if (! empty($row_fundings)) {
            $response["success"] = 1;
            $response["fundings"] = [];
            $response["message"] = "Here are All the Fundings";

            foreach ($row_fundings as $funding) {

            }

            return $response;
        } else {
            // no routes found
            $response["success"] = 0;
            $response["message"] = "No Routes Found";

            return $response;
        }

    }
}

