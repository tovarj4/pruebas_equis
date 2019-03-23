<?php
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 22/03/19
 * Time: 05:07 PM
 */
include_once ("core/db_core.php");
class postal_code extends db_core
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
            $conn = parent::getConnection();
            $sql = "SELECT estado, municipio";
            $sql .= " FROM codigos_postales WHERE codigo_postal =:cp limit 1;";

            $stmt = $conn->prepare($sql);
            $stmt->execute(array(":cp" => $this->cp));

            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->qry = $sql;
            $this->error = 'false';

            return $array;
        }
        catch (PDOException $e) {
            $this->error = 'true';
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getColonias()
    {
        try {
            $conn = parent::getConnection();
            $sql = "SELECT colonia";
            $sql .= " FROM codigos_postales WHERE codigo_postal =:cp order by colonia;";

            $stmt = $conn->prepare($sql);
            $stmt->execute(array(":cp" => $this->cp));
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->qry = $sql;
            $this->error = 'false';

            return $array;
        }
        catch (PDOException $e) {
            $this->error = 'true';
            echo "ERROR: " . $e->getMessage();
        }
    }
}