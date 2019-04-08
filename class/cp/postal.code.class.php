<?php
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 22/03/19
 * Time: 05:07 PM
 */
include_once ("../core/db.core.php");
class _code extends db_core
{
    var $error = false;
    var $qry = "sin query";
    private $cp;

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }


    public function getEstadoMunicipio()
    {
        try {



            /*
             * $conn = parent::getConnection();
             * $stmt = $conn->prepare($sql);
             * $stmt->execute(array(":cp" => $this->cp));
             * $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            */
            $sql = "SELECT id, estado, municipio FROM codigos_postales WHERE codigo_postal =:cp limit 1;";
            $this->executeQuery($sql,array(":cp" => $this->cp),true);
            $array = $this->resultArray;

            $this->qry = $sql;
            $this->error = 'false';


        }
        catch (PDOException $e) {
            $this->error = 'true';
            $array = array ("ERROR: " => $e->getMessage());
        }
        return $array;
    }

    public function getColonias()
    {
        try {

            $sql = "SELECT colonia FROM codigos_postales WHERE codigo_postal =:cp order by colonia;";
            $this->executeQuery($sql,array(":cp" => $this->cp),true);
            $array = $this->resultArray;

            $this->qry = $sql;
            $this->error = 'false';

            return $array;
        }
        catch (PDOException $e) {
            $this->error = 'true';
            $array = array ("ERROR: " => $e->getMessage());
        }
        return $array;
    }
}