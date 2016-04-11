<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
namespace Database\migrations;

use App\Kernel\DbManager;
use App\Kernel\IoC;

/**
 * Class FundsTableMigration.
 */
class FundsTableMigration implements Migration
{

    /**
     * Create table(s).
     *
     * @return mixed
     */
    public static function up()
    {
        $dbManager = IoC::resolve(DbManager::class);

        $query =
            'CREATE TABLE `'.getenv('DB_NAME').'`.`'.User::$tableName.'` ('.
            '`'.User::$columnPrimaryKey.'` INT NOT NULL AUTO_INCREMENT, '.
            '`'.User::$columnFirstName.'` VARCHAR(45) NULL, '.
            '`'.User::$columnLastName.'` VARCHAR(45) NULL, '.
            '`'.User::$columnEmail.'` VARCHAR(255) NOT NULL, '.
            '`'.User::$columnPassword.'` VARCHAR(60) NOT NULL, '.
            'PRIMARY KEY (`'.User::$columnPrimaryKey.'`), '.
            'UNIQUE INDEX `'.User::$columnEmail.'_UNIQUE` (`'.User::$columnEmail.'` ASC));';
        $dbManager->getConnection()->prepare($query)->execute();

        echo User::$tableName." table created.\n";
    }

    /**
     * Drop table(s).
     *
     * @return mixed
     */
    public static function down()
    {
        // TODO: Implement down() method.
    }
}