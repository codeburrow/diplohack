<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\DbServices;

use App\Kernel\DbManager;
use PDO;

/**
 * Class CategoryService.
 */
class CategoryDbService extends DbManager
{
    /**
     * Returns all the categories or false if internal server error occured.
     *
     * @return array|false
     */
    public function get()
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`categories`';

        $statement = $this->getConnection()->prepare($query);

        if (! $statement->execute()) {
            return false;
        }

        $routes = $statement->fetchAll();

        return $routes;
    }

    /**
     * Find the category by the given name. If the name given does not exists create it.
     *
     * @param $name
     * @return mixed
     */
    public function findOrCreateByName($name)
    {
        if (false !== ($category = $this->findByName($name))) {
            return $category;
        }

        return $this->create($name);
    }

    public function findByName($name)
    {
        $query = 'SELECT * FROM `'.getenv('DB_NAME').'`.`categories` WHERE `name` = :name';

        $statement = $this->getConnection()->prepare($query);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}