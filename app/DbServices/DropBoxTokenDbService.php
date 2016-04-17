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
     * Token key is required.
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
}