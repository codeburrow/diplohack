<?php
/**
 * @author Rizart Dokollar <r.dokollari@gmail.com
 * @since 4/17/16
 */

namespace Database\migrations;


use App\Kernel\DbManager;
use App\Kernel\IoC;
use Colors\Color;

class DropBoxTokensTableMigration implements Migration
{
    const TABLE_NAME = 'drop_box_tokens';

    /**
     * Create table(s).
     *
     * @return mixed
     */
    public static function up()
    {
        echo "Creating '".self::TABLE_NAME."' table: ";

        $dbManager = IoC::resolve(DbManager::class);

        $query =
            'CREATE TABLE `'.getenv('DB_NAME').'`.`'.self::TABLE_NAME.'` (
              `id` INT NOT NULL AUTO_INCREMENT,
              `token` TEXT NOT NULL,
              `description` TEXT NULL,
              `created_at` DATETIME NULL,
            PRIMARY KEY (`id`));';

        $dbManager->getConnection()->prepare($query)->execute();

        $color = new Color();

        echo $color("Done. \n")->green();
    }

    /**
     * Drop table(s).
     *
     * @return mixed
     */
    public static function down()
    {
        $color = new Color();

        echo $color("Dropping '".self::TABLE_NAME."' table: ")->yellow();

        $dbManager = IoC::resolve(DbManager::class);

        $query = 'DROP TABLE `'.getenv('DB_NAME').'`.`'.self::TABLE_NAME.'`;';

        $dbManager->getConnection()->prepare($query)->execute();

        echo $color("Done. \n")->green();
    }
}