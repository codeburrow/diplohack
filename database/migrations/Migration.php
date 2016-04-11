<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
namespace Database\migrations;

/**
 * Interface Migration.
 */
interface Migration
{
    /**
     * Create table(s).
     *
     * @return mixed
     */
    public static function up();

    /**
     * Drop table(s).
     *
     * @return mixed
     */
    public static function down();
}