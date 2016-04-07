<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
namespace App\Models;

/**
 * Class User.
 */
class User
{
    public static $tableName = 'users';
    public static $columnPrimaryKey = 'id';
    public static $columnFirstName = 'first_name';
    public static $columnLastName = 'last_name';
    public static $columnEmail = 'email';
    public static $columnPassword = 'password';
}