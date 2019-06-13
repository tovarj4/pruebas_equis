<?php
include('login.user.class.php');
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 12/06/2019
 * Time: 10:37 PM
 */
if (isset($_POST['user']) && isset($_POST['pass'])) {
    LoginUser::login($_POST['user'], $_POST['pass']);
    if (isset($_SESSION['logged'])) {
        header("Location: http://localhost/pruebas_equis/admon.php");
        die();
    } else {
        header("Location: http://localhost/pruebas_equis/index.php");
        die();
    }
} elseif (isset($_SESSION['logged'])) {
    LoginUser::logout();
    header("Location: http://localhost/pruebas_equis/index.php");
    die();
}