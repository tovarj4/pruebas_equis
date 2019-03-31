<?php
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 31/03/2019
 * Time: 01:21 AM
 */
include_once ("./clientes.class.php");
$clientes = new  Clientes();

if(isset($_GET['action'])){

    if($_GET['action'] == 1){

        //echo json_encode($clientes->setNew($_POST['Name'],$_POST['Phone'],$_POST['Address'],$_POST['IdPostal'],$_POST['ContactPerson'],$_POST['ClientEmail']));
        echo json_encode($clientes->setNew($_GET['Name'],$_GET['Phone'],$_GET['Address'],$_GET['IdPostal'],$_GET['ContactPerson'],$_GET['ClientEmail'],1));

    }
    if($_GET['action']==2){
        echo($clientes->getOne($_GET['id']));
    }
}