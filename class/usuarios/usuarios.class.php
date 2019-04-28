<?php
include_once('../core/db.core.php');
include_once('./usuarios.model.php');
include_once('../common/crud.php');

class Usuarios extends db_core implements Crud
{
    private $arrayDB;
    private $queryString;

    public function setNew(
        $user, $pass, $lastLogin, $name, $lastName, $secondLastName, $mail, $phone, $contractDate, $birthDate, $address, $idCp, $status, $userType
    )
    {
        $usuarios = new usuarios_model(0, $user, $pass, $lastLogin, $name, $lastName, $secondLastName, $mail, $phone, $contractDate, $birthDate, $address, $idCp, $status, $userType);
        $this->arrayDB = $usuarios->objectToArrayInsert();
        $this->queryString = $usuarios->getSentence("insert");
        return $this->create();
    }

    public function setUpdate(
        $id, $user, $pass, $lastLogin, $name, $lastName, $secondLastName, $mail, $phone, $contractDate, $birthDate, $address, $idCp, $status, $userType
    )
    {
        $usuarios = new usuarios_model($id, $user, $this->setPassword($pass), $lastLogin, $name, $lastName, $secondLastName, $mail, $phone, $contractDate, $birthDate, $address, $idCp, $status, $userType);
        $this->arrayDB = $usuarios->objectToArrayUpdate();
        $this->queryString = $usuarios->getSentence("update");
        return $this->update();
    }

    public function setDisable(
        $id, $status
    )
    {
        $usuarios = new usuarios_model($id, '', '', '', '', '', '', '', '', '', '', '', $status, '');
        $this->arrayDB = $usuarios->objectToArrayDisable();
        $this->queryString = $usuarios->getSentence("disable");
        return $this->delete();
    }

    public function getOne($id)
    {
        $usuarios = new usuarios_model($id, '', '', '', '', '', '', '', '', '', '', '', '', '');
        $this->queryString = $usuarios->getSentence("selectone");
        $this->arrayDB = $usuarios->objectToArraySelectOne();
        return $this->selectSingle();
    }

    public function getAll()
    {
        $usuarios = new usuarios_model(0, '', '', '', '', '', '', '', '', '', '', '', '', '');
        $this->queryString = $usuarios->getSentence("selectall");
        return $this->selectAll();
    }

    private function setPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /*
     * para desencriptar el password
     */
    private function decryptPass()
    {
        $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

        if (password_verify('rasmuslerdorf', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
    }

    /*
     *Data operations
     */
    public function create()
    {
        $this->executeQuery($this->queryString, $this->arrayDB, false);

        if ($this->dbResult) {
            $arrRes = array("status" => "OK");
        } else {
            $arrRes = array("status" => "FAIL");
        }
        return $arrRes;

    }

    public function update()
    {
        $this->executeQuery($this->queryString, $this->arrayDB, false);

        if ($this->dbResult) {
            $arrRes = array("status" => "OK");
        } else {
            $arrRes = array("status" => "FAIL", " " . "  " . json_encode($this->clienteArray));
        }
        return $arrRes;
    }

    public function delete()
    {
        $this->executeQuery($this->queryString, $this->arrayDB, false);

        if ($this->dbResult) {
            $arrRes = array("status" => "OK");
        } else {
            $arrRes = array("status" => "FAIL");
        }
        return $arrRes;
    }

    public function selectSingle()
    {
        $this->executeQuery($this->queryString, $this->arrayDB, true);
        return $this->resultArray;
    }


    public function selectAll()
    {
        $this->executeQuery($this->queryString, "", true);
        return $this->resultArray;
    }
}