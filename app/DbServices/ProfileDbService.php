<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\DbServices;

use App\Kernel\DbManager;
use PDO;

/**
 * Class DistrictService.
 */
class ProfileDbService extends DbManager
{
    public function get()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`profiles`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $routes;
    }

    public function findOrCreateByName($name)
    {
        if (false !== ($category = $this->findByName($name))) {
            return $category;
        }

        return $this->findById(
            $this->create(['name' => $name])
        );
    }

    public function findByName($name)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`profiles` WHERE `name` = :name';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`profiles` WHERE `id` = :id';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = 'INSERT INTO `'.getenv('DB_NAME').'`.`profiles` (`name`, `description`) VALUES (:name, :description);';

        $name = $data['name'];
        $description = isset($data['description']) ? $data['description'] : null;

        $statement = $this->getConnection()->prepare($query);

        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);

        $statement->execute();

        return $this->getConnection()->lastInsertId();
    }

}