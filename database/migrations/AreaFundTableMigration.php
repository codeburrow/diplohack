<?php
/**
 * @author Rizart Dokollar <r.dokollari@gmail.com
 * @since 4/13/16
 */
namespace Database\migrations;

use App\Kernel\DbManager;
use App\Kernel\IoC;
use Colors\Color;

class AreaFundTableMigration implements Migration
{
    const TABLE_NAME = 'area_fund';

    /**
     * Create table(s).
     *
     * @return mixed
     */
    public static function up()
    {
        echo "Creating '".self::TABLE_NAME."' table: ";

        $dbManager = IoC::resolve(DbManager::class);

        $query = 'CREATE TABLE `'.getenv('DB_NAME').'`.`'.self::TABLE_NAME.'` (
                  `id` INT NOT NULL AUTO_INCREMENT,
                  `area_id` INT NOT NULL,
                  `fund_id` INT NOT NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_area_fund_area_id_idx` (`area_id` ASC),
                  INDEX `fk_area_fund_fund_id_idx` (`fund_id` ASC),
                  CONSTRAINT `fk_area_fund_area_id`
                    FOREIGN KEY (`area_id`)
                    REFERENCES `'.getenv('DB_NAME').'`.`'.AreasTableMigration::TABLE_NAME.'` (`id`)
                    ON DELETE RESTRICT
                    ON UPDATE CASCADE,
                  CONSTRAINT `fk_area_fund_fund_id`
                    FOREIGN KEY (`fund_id`)
                    REFERENCES `'.getenv('DB_NAME').'`.`'.FundsTableMigration::TABLE_NAME.'` (`id`)
                    ON DELETE RESTRICT
                    ON UPDATE CASCADE);';

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