<?php
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 31/03/2019
 * Time: 01:21 AM
 */
include_once ("./clientes.class.php");
$clientes = new  Clientes();


if(isset($_POST['action'])){

    if($_POST['action']==0){//get All

        $arr = $clientes->getAll();
        $len = count($arr);

        for ($i = 0; $i<$len;$i++){

            if(($i%2) == 0){
                echo "<tr  class='active'>";
            }else{
                echo "<tr  class='success'>";
            }

            echo "<td>";
            echo $arr[$i]['id'];
            echo "</td>";

            echo "<td>";
            echo $arr[$i]['nombre'];
            echo "</td>";
            echo "<td>";
            echo $arr[$i]['telefono'];
            echo "</td>";
            echo "<td>";
            echo $arr[$i]['direccion'];
            echo "</td>";
            echo "<td>";
            echo $arr[$i]['rfc'];
            echo "</td>";

            echo "<td><a  class='btn ' href='javascript:clientes.getOne(".$arr[$i]['id'].");'><span style=\"font-size:25px;\" class=\"glyphicon glyphicon-sunglasses\" aria-hidden=\"true\"></span></a></td>";

            echo "</tr>";

        }
    }//getAll
    if($_POST['action']==1){//get Single
        $arr = $clientes->getOne($_POST['id']);
        if(COUNT($arr) > 0 ){
            $status = array("status"=>"OK");
        }else{
            $status = array("status"=>"FAIL");
        }

        $finalArray = array_merge($status,$arr);
        echo(json_encode($finalArray));
    }//getOne
    if($_POST['action'] == 2){
        echo json_encode($clientes->setNew($_POST['name'],$_POST['phone'],$_POST['address'],$_POST['postal'],$_POST['contact'],$_POST['contactMail'],$_POST['rfc'],$_POST['social'],1));
    }//add
    if($_POST['action'] == 3){
        echo json_encode($clientes->
        setUpdate($_POST['id'],$_POST['name'],$_POST['phone'],$_POST['address'],$_POST['postal'],$_POST['contact'],$_POST['contactMail'],$_POST['rfc'],$_POST['social'],1)
        );
    }//edit

    if($_POST['action'] == 4){
        echo json_encode($clientes->
        setDisable($_POST['id'],3)
        );
    }//edit
}

if(isset($_GET['action'])){

    if($_GET['action'] == 1){

        //echo json_encode($clientes->setNew($_GET['name'],$_GET['phone'],$_GET['address'],$_GET['postal'],$_GET['contact'],$_GET['contactMail'],1));
        echo json_encode($clientes->setNew($_GET['Name'],$_GET['Phone'],$_GET['Address'],$_GET['IdPostal'],$_GET['ContactPerson'],$_GET['ClientEmail'],1));

    }
    if($_GET['action']==2){
        $arr = $clientes->getOne($_GET['id']);
        if(COUNT($arr) > 0 ){
            $status = array("status"=>"OK");
        }else{
            $status = array("status"=>"FAIL");
        }

        $finalArray = array_merge($status,$arr);

        //var_dump($finalArray);
        echo(json_encode($finalArray));
    }

    if($_GET['action']==3){//get All
        echo($clientes->getAll());
    }
}

