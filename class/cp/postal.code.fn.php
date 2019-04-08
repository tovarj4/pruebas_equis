<?php
include_once _('postal.code.class.php');
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 22/03/19
 * Time: 05:23 PM
 */
$_cp = new _code();

if (isset($_POST['cp']) && isset($_POST['w'])) {

    $codigo = $_POST['cp'];
    $what = $_POST['w'];
    $_cp->setCp($codigo);

    if ($what == "m") {
        $arrEdoMnpo = $_cp->getEstadoMunicipio();


        if (count($arrEdoMnpo) > 0) {
            $response = array(
                'status' => 'OK' , 'cpostal' => utf8_encode($arrEdoMnpo[0]["id"]), 'estado' => utf8_encode($arrEdoMnpo[0]["estado"]), 'municipio' => utf8_encode($arrEdoMnpo[0]["municipio"]));

        } else {
            $response = array('status' => 'FAIL', "message" => "no se encontraron registros para ese CP.");
        }


        echo(json_encode($response));
    }
    if($what == "c"){
        $arrColonias = $_cp->getColonias();

        if(count($arrColonias) > 0){
            $response=array();
            foreach($arrColonias as $row){
                $response[]=utf8_encode($row['colonia']);
            }

            //echo json_encode(utf8_encode($arrColonias));

        }else{
            $response = array('status'=>'FAIL',"message" => "no se encontraron registros para ese CP.");
        }
        echo json_encode($response);
    }
}

if (isset($_GET['cp']) && isset($_GET['w'])) {
    $codigo = $_GET['cp'];
    $what = $_GET['w'];
    $_cp->setCp($codigo);
    if($what == "c"){
        $arrColonias = $_cp->getColonias();

        if(count($arrColonias) > 0){
            $response=array();
            foreach($arrColonias as $row){
                $response[]=utf8_encode($row['colonia']);
            }

            //echo json_encode(utf8_encode($arrColonias));

        }else{
            $response = array('status'=>'FAIL',"message" => "no se encontraron registros para ese CP.");
        }
        echo json_encode($response);
    }


}
