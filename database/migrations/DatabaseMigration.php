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
        // Primary tables
        FundsTableMigration::up();
        AreasTableMigration::up();
        CategoriesTableMigration::up();
        LinksTableMigration::up();
        ProfilesTableMigration::up();

        // Relation tables
        AreaFundTableMigration::up();
        CategoryFundTableMigration::up();
        FundLinkTableMigration::up();
        FundProfileTableMigration::up();
    }

    /**
     * Drop table(s). First need to drop relation tables, in order to drop foreign keys..
     *
     * @return mixed
     */
    public static function down()
    {
        // Relation tables
        AreaFundTableMigration::down();
        CategoryFundTableMigration::down();
        FundLinkTableMigration::down();
        FundProfileTableMigration::down();

        // Primary tables
        FundsTableMigration::down();
        AreasTableMigration::down();
        CategoriesTableMigration::down();
        LinksTableMigration::down();
        ProfilesTableMigration::down();
    }
}