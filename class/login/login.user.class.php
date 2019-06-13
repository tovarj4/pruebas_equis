<?php
session_start();

include_once("../core/db.inc");

/**
 * Created by PhpStorm.
 * User: papa
 * Date: 12/06/2019
 * Time: 10:37 PM
 */
class LoginUser
{
    public static function login($user, $pass)
    {


        @$connection = new PDO('mysql:host=' . SERVER . ';dbname=' . DB, DB_USER,
            DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {

            $credentials = array(":user" => $user);
            $stmt = $connection->prepare("SELECT * FROM usuarios where usuario = :user;");
            if (is_array($credentials) && count($credentials) > 0) {
                $stmt->execute($credentials);
            } else {
                $stmt->execute();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }

        //var_dump($user);

        if (sizeof($user) > 0) {
            if (password_verify($pass, $user[0]['password'])) {
                $_SESSION['logged'] = true;
                $_SESSION['user_type'] = $user[0]['id_tipo_usuario'];
                $_SESSION['name'] = $user[0]['nombre'] . " " . $user[0]['apellido_paterno'];
            }
        }
    }

    public static function logout()
    {
        unset($_SESSION['logged']);
    }

}