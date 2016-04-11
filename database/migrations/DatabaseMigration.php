<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
namespace Database\migrations;

/**
 * Class DatabaseMigration.
 */
class DatabaseMigration implements Migration
{

    /**
     * Create table(s).
     *
     * @return mixed
     */
    public static function up()
    {
        FundsTableMigration::up();
    }

    /**
     * Drop table(s).
     *
     * @return mixed
     */
    public static function down()
    {
        FundsTableMigration::down();
    }
}