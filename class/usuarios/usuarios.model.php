<?php
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 31/03/2019
 * Time: 12:20 AM
 */
include_once("../common/common.functions.php");

class usuarios_model extends CommonFunctions
{
    private $id;
    private $usuario;
    private $password;
    private $ultimoIngreso;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $email;
    private $telefono;
    private $fechaIngreso;
    private $fechaNacimiento;
    private $idCodigoPostal;
    private $idStatus;
    private $idTipoUsuario;

    /**
     * usuarios_model constructor.
     * @param $id
     * @param $usuario
     * @param $password
     * @param $ultimoIngreso
     * @param $nombre
     * @param $apellidoPaterno
     * @param $apellidoMaterno
     * @param $email
     * @param $telefono
     * @param $fechaIngreso
     * @param $fechaNacimiento
     * @param $idCodigoPostal
     * @param $idStatus
     * @param $idTipoUsuario
     */
    public function __construct($id, $usuario, $password, $ultimoIngreso, $nombre, $apellidoPaterno, $apellidoMaterno, $email, $telefono, $fechaIngreso, $fechaNacimiento, $idCodigoPostal, $idStatus, $idTipoUsuario)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->ultimoIngreso = $ultimoIngreso;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->idCodigoPostal = $idCodigoPostal;
        $this->idStatus = $idStatus;
        $this->idTipoUsuario = $idTipoUsuario;
    }


    public function new(
        $user, $pass, $lastLogin, $name, $lastName, $secondLastName, $mail, $phone, $contractDate, $birthDate, $address, $idCp, $status, $userType
    )
    {

        $this->usuario = $user;
        $this->password = $pass;
        $this->ultimoIngreso = $lastLogin;
        $this->nombre = $name;
        $this->apellidoPaterno = $lastName;
        $this->apellidoMaterno = $secondLastName;
        $this->email = $mail;
        $this->telefono = $phone;
        $this->fechaIngreso = $contractDate;
        $this->fechaNacimiento = $birthDate;
        $this->direccion = $address;
        $this->idCodigoPostal = $idCp;
        $this->idStatus = $status;
        $this->idTipoUsuario = $userType;

    }

    public function getSentence($type)
    {
        $sentence = "";
        if ($type === "insert") {
            $sentence = "INSERT INTO usuarios(usuario, password, ultimo_ingreso, nombre, apellido_paterno, apellido_materno, email, telefono, fecha_ingreso, fecha_nacimiento, direccion, id_codigo_postal, id_status, id_tipo_usuario)";
            $sentence .= "VALUES (";
            $sentence .= " :usuario";
            $sentence .= " :ultimoIngreso";
            $sentence .= " :nombre";
            $sentence .= " :apellidoPaterno";
            $sentence .= " :apellidoMaterno";
            $sentence .= " :email";
            $sentence .= " :telefono";
            $sentence .= " :fechaIngreso";
            $sentence .= " :fechaNacimiento";
            $sentence .= " :direccion";
            $sentence .= ":idCodigoPostal";
            $sentence .= ":idStatus";
            $sentence .= ":idTipoUsuario";
            $sentence .= ");";
        } elseif ($type === "update") {
            $sentence .= "UPDATE usuarios ";
            $sentence .= "SET ";
            $sentence .= " usuario= :usuario,";
            $sentence .= " password= :password,";
            $sentence .= " ultimo_ingreso=ultimoIngreso,";
            $sentence .= " nombre=:nombre,";
            $sentence .= " apellido_paterno= :apellidoPaterno,";
            $sentence .= " apellido_materno= apellidoMaterno,";
            $sentence .= " email= :email,";
            $sentence .= " telefono= :telefon,";
            $sentence .= " fecha_ingreso= :fechaIngreso ,";
            $sentence .= " fecha_nacimiento= :fechaNacimiento,";
            $sentence .= " direccion= :direccion,";
            $sentence .= " id_codigo_postal=:idCodigoPostal,";
            $sentence .= " id_status=:idTipoStatus,";
            $sentence .= " id_tipo_usuario=:idTipoUsuario";
            $sentence .= " WHERE id=:id";
        } elseif ($type === "disable") {
            $sentence = "UPDATE usuarios SET id_status =:idStatus WHERE id =:id;";
        } elseif ($type === "selectall") {
            $sentence = "SELECT id_usuario, usuario, ultimo_ingreso, nombre, apellido_paterno from vw_usuarios;";
        } elseif ($type === "selectone") {
            $sentence = "SELECT id_usuario, usuario, ultimo_ingreso, nombre, apellido_paterno, apellido_materno, email, telefono, fecha_ingreso, fecha_nacimiento, direccion, codigo_postal, colonia, municipio, estado, status, tipo_usuario FROM vw_usuarios WHERE id_usuario =:id;";
        }

        return $sentence;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function objectToArray()
    {
        $array = array(
            ":id" => $this->id,
            ":usuario" => $this->nombre,
            ":ultimoIngreso" => $this->direccion,
            ":nombre" => $this->codigoPostal,
            ":apellidoPaterno" => $this->colonia,
            ":apellidoMaterno" => $this->estado,
            ":email" => $this->municipio,
            ":telefono" => $this->personaContacto,
            ":fechaIngreso" => $this->email,
            ":fechaNacimiento" => $this->fechaNacimiento,
            ":direccion" => $this->direccion,
            ":idCodigoPostal" => $this->idCodigoPostal,
            ":idStatus" => $this->status,
            ":idTipoUsuario" => $this->idTipoUsuario
        );
        return $array;
    }

    public function objectToArrayInsert()
    {
        $array = array(
            ":usuario" => $this->nombre,
            ":ultimoIngreso" => $this->direccion,
            ":nombre" => $this->codigoPostal,
            ":apellidoPaterno" => $this->colonia,
            ":apellidoMaterno" => $this->estado,
            ":email" => $this->municipio,
            ":telefono" => $this->personaContacto,
            ":fechaIngreso" => $this->email,
            ":fechaNacimiento" => $this->fechaNacimiento,
            ":direccion" => $this->direccion,
            ":idCodigoPostal" => $this->idCodigoPostal,
            ":idStatus" => $this->status,
            ":idTipoUsuario" => $this->idTipoUsuario
        );
        return $array;
    }

    public function objectToArrayUpdate()
    {
        $array = array(
            ":id" => $this->id,
            ":usuario" => $this->nombre,
            ":ultimoIngreso" => $this->direccion,
            ":nombre" => $this->codigoPostal,
            ":apellidoPaterno" => $this->colonia,
            ":apellidoMaterno" => $this->estado,
            ":email" => $this->municipio,
            ":telefono" => $this->personaContacto,
            ":fechaIngreso" => $this->email,
            ":fechaNacimiento" => $this->fechaNacimiento,
            ":direccion" => $this->direccion,
            ":idCodigoPostal" => $this->idCodigoPostal,
            ":idStatus" => $this->status,
            ":idTipoUsuario" => $this->idTipoUsuario
        );
        return $array;
    }

    public function objectToArrayDisable()
    {
        $array = array(
            ":id" => $this->id,
            ":status" => $this->status
        );
        return $array;
    }

    public function objectToArraySelectOne()
    {
        $array = array(
            ":id" => $this->id
        );
        return $array;
    }

    public function objectToJson($object)
    {
        return parent::objectToJson($object); // TODO: Change the autogenerated stub
    }


}