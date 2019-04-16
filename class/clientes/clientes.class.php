<?php
include_once ('../core/db.core.php');
include_once ('./clientes.model.php');
include_once ('../if/crud.php');

class Clientes extends db_core implements Crud
{
    private $clienteArray;
    private $cliente;

    private $idCliente;
    private $sqlInsert="INSERT INTO clientes(nombre, telefono, direccion, id_codigo_postal, persona_contacto, email,rfc, razon_social, id_status)"
                      ." VALUES(:nombre, :telefono, :direccion,:codigoPostal, :personaContacto, :email, :rfc, :razonSocial,:status);";
    private $sqlSelect= "SELECT id,id_cp,nombre, telefono,direccion,codigo_postal,colonia,municipio,estado,persona_contacto,rfc,razon_social,email,status FROM vw_clientes";
    private $sqlSelectMin="SELECT id,nombre,telefono, direccion,rfc FROM vw_clientes;";
    private $sqlUpdate="UPDATE clientes SET nombre = :nombre,telefono = :telefono, direccion = :direccion, id_codigo_postal =:codigo_postal, email = :email, rfc = :rfc, razon_social = :razon_social WHERE id =:id";
    private $sqlDisable="UPDATE clientes SET status =:id_status WHERE id =:id";

    public function setNew(
        $nombre,$telefono,$direccion,$codigoPostal,$personaContacto,$email,$rfc,$razonSocial,$status
    ){
        $clientes = new clientes_model();
        $this->cliente = $clientes->new($nombre,$telefono,$direccion,$codigoPostal,'','','',$personaContacto,$email,$rfc,$razonSocial,$status);
        $this->clienteArray =  $clientes->objectToArrayInsert();
        return $this->create();
    }
    public function setUpdate(
        $id,$nombre,$telefono,$direccion,$codigoPostal,$personaContacto,$email,$rfc,$razonSocial,$status
    ){
        $this->cliente = new clientes_model($nombre,$telefono,$direccion,$codigoPostal,'','','',$personaContacto,$email,$rfc,$razonSocial,$status);
        //$this->cliente = $clientes->new($nombre,$telefono,$direccion,$codigoPostal,'','','',$personaContacto,$email,$rfc,$razonSocial,$status);
        $this->cliente.setId($id);
        $this->clienteArray =  $this->cliente->objectToArray();
        return $this->update();
    }

    public function  getOne($id){
        $this->idCliente = $id;
        return $this->selectSingle();
    }
    public function  getAll(){

        return $this->selectAll();
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
        $this->executeQuery($this->sqlUpdate,$this->clienteArray,false);

        if ($this->dbResult){
            $arrRes = array("status"=>"OK");
        }else{
            $arrRes = array("status"=>"FAIL");
        }
        return $arrRes;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function selectSingle()
    {
        $this->executeQuery($this->sqlSelect." WHERE id =:id",array(":id"=>$this->idCliente),true);
        return $this->resultArray;
    }


    public function selectAll()
    {
        $this->executeQuery($this->sqlSelectMin,"",true);
        return $this->resultArray;
    }
}