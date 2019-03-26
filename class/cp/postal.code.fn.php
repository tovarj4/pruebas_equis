<?php
include_once _('postal_code.php');
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 22/03/19
 * Time: 05:23 PM
 */
$_cp = new postal_code();

if (isset($_POST['cp']))
{
    $codigo = $_POST['cp'];
    $_cp->setCp($codigo);
    $arrEdoMnpo = $_cp->getEstadoMunicipio();
    $arrColonias = $_cp->getColonias();

    if(count($arrEdoMnpo) >0 && count($arrColonias) >0){
        $colonias="";

        for($i=0;$i<count($arrColonias);$i++)
        {
            $colonias .=  $arrColonias[$i]['colonia'] ;
            if($i+1 < count($arrColonias)){
                $colonias .= ',';
            }

        }


        $response = array('status'=>'OK','estado' => utf8_encode($arrEdoMnpo[0]['estado']),'municipio' => utf8_encode($arrEdoMnpo[0]['municipio']), 'colonias' =>  utf8_encode($colonias) );

    }else{
        $response = array('status'=>'FAIL',"message" => "no se encontraron registros para ese CP.");
    }


    echo(json_encode($response));

}
