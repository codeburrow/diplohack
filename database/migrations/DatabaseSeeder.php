<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
namespace Database\migrations;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder implements Seeder
{
    public static function up()
    {
        UsersTableSeeder::up();
    }

    public static function down()
    {
        UsersTableSeeder::down();
    }
}