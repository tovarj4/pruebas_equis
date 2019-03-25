<?php
include_once _('postal_code.php');
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 22/03/19
 * Time: 05:23 PM
 */
$_cp = new postal_code();

if (isset($_GET['cp']))
{
    $codigo = $_GET['cp'];
    $_cp->setCp($codigo);
    $arrEdoMnpo = $_cp->getEstadoMunicipio();
    $arrColonias = $_cp->getColonias();

    $colonias="";

    for($i=0;$i<count($arrColonias);$i++)
    {
        $colonias .=  $arrColonias[$i]['colonia'] ;
        if($i+1 < count($arrColonias)){
            $colonias .= ',';
        }

    }


    $response = array('estado' => $arrEdoMnpo[0]['municipio'],'municipio' => $arrEdoMnpo[0]['estado'], 'colonias' =>  utf8_encode($colonias) );

    echo(json_encode($response));

}
