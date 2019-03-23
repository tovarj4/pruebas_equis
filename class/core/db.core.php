<?php
include_once ("db.inc");
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 22/03/19
 * Time: 05:09 PM
 */

class db_core
{
    private $connection;
    /**
     * student::mysqlLink()
     *
     * @return
     */
    private function mysqlLink()
    {
        @$connection = new PDO('mysql:host=' . SERVER . ';dbname=' . DB, DB_USER,
            DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }

    /**
     * student::__construct()
     *
     * @return
     */
    public function __construct()
    {
        $this->connection = $this->mysqlLink();

    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }


}