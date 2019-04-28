<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ingresar</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
    <script type="text/javascript" src="js/login.js"></script>
    <link href="css/bootstrap3.3.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap3.3.min.js"></script>

</head>
<body id="main_body">

<img id="top" src="img/top.png" alt="">
<div id="form_container">

    <h1><a>Ingresar</a></h1>
    <form id="form_61596" class="appnitro" method="post" action="">
        <div class="form_description">
            <h2>Ingresar</h2>
            <p>Ingresa tus credenciales para acceder al sistema.</p>
        </div>
        <ul>

            <li id="li_1">
                <label class="description" for="element_1">Usuario </label>
                <div>
                    <input id="user" name="user" class="form-control" type="text" maxlength="255" value=""/>
                </div>
                <p class="guidelines" id="guide_1">
                    <small>Usuario</small>
                </p>
            </li>
            <li id="li_2">
                <label class="description" for="password">Password </label>
                <div>
                    <input id="password" name="password" class="form-control" type="password" maxlength="255" value=""/>
                </div>
                <p class="guidelines" id="guide_2">
                    <small>Password</small>
                </p>
            </li>

            <li class="buttons right">
                <input id="saveForm" class="btn btn-primary" type="submit" name="submit" value="Acceder"/>
            </li>
        </ul>
    </form>

</div>

</body>
</html>