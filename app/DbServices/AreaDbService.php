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
class AreaDbService extends DbManager
{
    public function get()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`areas`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOrCreateByName($name)
    {
        if (false !== ($fund = $this->findByName($name))) {
            return $fund;
        }

        return $this->findById(
            $this->create(['name' => $name])
        );
    }

    public function findByName($name)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`areas` WHERE `name` = :name';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`areas` WHERE `id` = :id';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = 'INSERT INTO `'.getenv('DB_NAME').'`.`areas` (`name`, `description`) VALUES (:name, :description);';

        $name = $data['name'];
        $description = isset($data['description']) ? $data['description'] : null;

        $statement = $this->getConnection()->prepare($query);

        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);

        $statement->execute();

        return $this->getConnection()->lastInsertId();
    }
}
