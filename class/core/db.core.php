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
    public $dbResult;
    public $resultArray;
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

    /**
     * @param $query
     * @param $params
     * @param $getArray
     */
    public function executeQuery($query,$params,$getArray)
    {
        $this->dbResult = false;
        try {

            $conn = $this->connection;
            $stmt = $conn->prepare($query);
            if(is_array($params) && count($params) > 0){
                $stmt->execute($params);
            }else{
                $stmt->execute();
            }



            if($getArray){
                $this->resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            $this->dbResult = true;
        }
        catch (PDOException $e) {

            $this->dbResult = false;

            echo "ERROR: " . $e->getMessage();


        }
    }


}