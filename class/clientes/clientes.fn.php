<?php
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 31/03/2019
 * Time: 01:21 AM
 */
include_once ("./clientes.class.php");
$clientes = new  Clientes();

/*
if(isset($_GET['action'])){

    if($_GET['action'] == 1){

        //echo json_encode($clientes->setNew($_GET['name'],$_GET['phone'],$_GET['address'],$_GET['postal'],$_GET['contact'],$_GET['contactMail'],1));
        echo json_encode($clientes->setNew($_GET['Name'],$_GET['Phone'],$_GET['Address'],$_GET['IdPostal'],$_GET['ContactPerson'],$_GET['ClientEmail'],1));

    }
    if($_GET['action']==2){
        echo($clientes->getOne($_GET['id']));
    }

    if($_GET['action']==3){//get All
        echo($clientes->getAll());
    }
}
*/
if(isset($_POST['action'])){

    if($_POST['action'] == 1){


        echo json_encode($clientes->setNew($_POST['name'],$_POST['phone'],$_POST['address'],$_POST['postal'],$_POST['contact'],$_POST['contactMail'],$_POST['rfc'],$_POST['social'],1));

    }
    if($_POST['action']==2){//get Single
        echo($clientes->getOne($_POST['id']));
    }
    if($_POST['action']==3){//get All
        echo($clientes->getAll());
    }
}