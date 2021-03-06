<?php
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 31/03/2019
 * Time: 12:20 AM
 */
include_once("../common/common.functions.php");
class clientes_model extends CommonFunctions
{
    private $id;
    private $nombre;
    private $telefono;
    private $direccion;
    private $codigoPostal;
    private $colonia;
    private $estado;
    private $municipio;
    private $personaContacto;
    private $email;
    private $rfc;
    private $razonSocial;
    private $status;


    public function new(
        $nombre,$telefono,$direccion,$codigoPostal,$colonia,$estado,$municipio,$personaContacto,$email,$rfc,$razonSocial,$status
    ){

        $this->nombre=$nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->codigoPostal = $codigoPostal;
        $this->colonia = $colonia;
        $this->estado = $estado;
        $this->municipio = $municipio;
        $this->personaContacto = $personaContacto;
        $this->email = $email;
        $this->rfc = $rfc;
        $this->razonSocial = $razonSocial;

        $this->status = $status;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function objectToArray(){
             $array = array(
                 ":id" => $this->id,
                 ":nombre" => $this->nombre,
                 ":telefono" => $this->telefono,
                 ":direccion" => $this->direccion,
                 ":codigo_Postal" => $this->codigoPostal,
                 ":colonia" => $this->colonia,
                 ":estado" => $this->estado,
                 ":municipio" => $this->municipio,
                 ":persona_Contacto" => $this->personaContacto,
                 ":email" => $this->email,
                 ":status" => $this->status
             );
             return $array;
    }

    public function objectToArrayInsert(){
        $array = array(
            ":nombre" => $this->nombre,
            ":telefono" => $this->telefono,
            ":direccion" => $this->direccion,
            ":codigoPostal" => $this->codigoPostal,
            ":personaContacto" => $this->personaContacto,
            ":email" => $this->email,
            ":rfc" => $this->rfc,
            ":razonSocial" => $this->razonSocial,
            ":status" => $this->status
        );
        return $array;
    }
    public function objectToArrayUpdate(){
        $array = array(
            ":nombre" => $this->nombre,
            ":telefono" => $this->telefono,
            ":direccion" => $this->direccion,
            ":codigoPostal" => $this->codigoPostal,
            ":personaContacto" => $this->personaContacto,
            ":email" => $this->email,
            ":rfc" => $this->rfc,
            ":razonSocial" => $this->razonSocial,
            ":id" => $this->id
        );
        return $array;
    }
    public function objectToArrayDisable(){
        $array = array(
            ":id" => $this->id,
            ":status" => $this->status
        );
        return $array;
    }

    public function objectToJson($object)
    {
        return parent::objectToJson($object); // TODO: Change the autogenerated stub
    }

    public function getClienteJson(){
        return $this->objectToJson($this->objectToArray());
    }


}