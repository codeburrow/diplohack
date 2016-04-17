<?php
/**
 * @author Rizart Dokollar <r.dokollari@gmail.com
 * @since 4/17/16
 */

namespace App\DbServices;

use App\Kernel\DbManager;
use PDO;

class DropBoxTokenDbService extends DbManager
{
    /**
     * Token key 'token' is required.
     *
     * @param $data
     * @return string
     */
    public function create(array $data)
    {
        $query = 'INSERT INTO `'.getenv('DB_NAME').'`.`drop_box_tokens` (`token`, `description`, `created_at`) VALUES (:token, :description, :created_at);';

        $token = $data['token'];
        $description = isset($data['description']) ? $data['description'] : null;
        $created_at = isset($data['created_at']) ? $data['created_at'] : null;

        $statement = $this->getConnection()->prepare($query);

        $statement->bindParam(':token', $token, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);

        $statement->execute();

        return $this->getConnection()->lastInsertId();
    }

    /**
     * @return array
     */
    public function getLatest()
    {
        $query = "
            SELECT * FROM drop_box_tokens WHERE id = (SELECT MAX(id) FROM drop_box_tokens);
            ";

        $statement = $this->getConnection()->prepare($query);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}