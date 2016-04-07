<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
namespace App\Kernel;

use Exception;
use PDO;
use PDOException;

/**
 * Class DbManager.
 */
class DbManager
{
    /**
     * @var
     */
    private static $instance;
    /**
     * @var PDO
     */
    private $dbConnection;

    /**
     * DbManager constructor.
     */
    public function __construct()
    {
        try {
            $this->dbConnection = new PDO(
                'mysql:host='.getenv('DB_HOST').';'.'dbname='.getenv('DB_NAME').';'.'port='.getenv('DB_PORT'),
                getenv('DB_USER'), getenv('DB_PASSWORD')
            );

            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, getenv('PDO_ERROR_MODE')); // CHANGE THE ERROR MODE, THROW AN EXCEPTION WHEN AN ERROR IS FOUND

            $this->dbConnection->exec("SET NAMES 'utf8'");
        } catch (PDOException $e) {
            throw new Exception('Could not connect to the database.\n'.$e->getMessage().'\n\n');
        }
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->getInstance();
    }

    /**
     * @return PDO
     */
    private function getInstance()
    {
        if (! self::$instance) self::$instance = new self();

        return self::$instance->dbConnection;
    }

    /**
     * @throws Exception
     */
    public function __clone()
    {
        throw new Exception('Can\'t clone a singleton.');
    }
}
