<?php
/**
 * Created by PhpStorm.
 * User: papa
 * Date: 12/06/2019
 * Time: 11:47 PM
 */

echo password_hash("T0v4r", PASSWORD_DEFAULT);
echo("<br>");
echo password_hash("tovarj4", PASSWORD_DEFAULT);
echo("<br>");


$hash = '$2y$10$2L6l9iwOJpd9Ko48wNmaqupFPNMVqlezR2jT4nohjuqiRueoPzerC';

if (password_verify("T0v4r", $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
