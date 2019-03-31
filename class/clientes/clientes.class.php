<?php
include_once ('../core/db.core.php');
include_once ('./clientes.model.php');
include_once ('../if/crud.php');

class Clientes extends db_core implements Crud
{
    private $clienteArray;

    private $idCliente;
    private $sqlInsert="INSERT INTO clientes(nombre, telefono, direccion, id_codigo_postal, persona_contacto, email, id_status)"
                      ." VALUES(:nombre, :telefono, :direccion,:codigoPostal, :personaContacto, :email,:status);";
    private $sqlSelectOne= "SELECT id,nombre, telefono, direccion, id_codigo_postal, persona_contacto, email, id_status FROM clientes WHERE id = :id;";


    public function setNew(
        $nombre,$telefono,$direccion,$codigoPostal,$personaContacto,$email,$status
    ){
        $clientes = new clientes_model();
        $this->cliente = $clientes->new($nombre,$telefono,$direccion,$codigoPostal,'','','',$personaContacto,$email,$status);
        $this->clienteArray =  $clientes->objectToArrayInsert();
        return $this->create();
    }
    public function  getOne($id){
        $this->idCliente = $id;
        return $this->selectSingle();
    }

    public function create()
    {
        $this->executeQuery($this->sqlInsert,$this->clienteArray,false);

        if ($this->dbResult){
            $arrRes = array("status"=>"OK");
        }else{
            $arrRes = array("status"=>"FAIL");
        }
        return $arrRes;

    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function selectSingle()
    {
        $this->executeQuery($this->sqlSelectOne,array(":id"=>$this->idCliente),true);
        $clientes = new clientes_model();
        return $clientes->objectToJson($this->resultArray);
        // TODO: Implement select() method.
    }

    public function selectAll()
    {
        // TODO: Implement select() method.
    }
}