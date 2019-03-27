<?php
/**
 * Created by PhpStorm.
 * User: tovar
 * Date: 21/03/19
 * Time: 11:08 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student List</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="tovar" >

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/tem.style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweet-alert.css"/>

    <link href="css/bootstrap3.3.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap3.3.min.js"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">🍕</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="dropdown sidebar sidebar-md">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Dropdown
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="dropdown-header">Ordenes de Servicio</li>
                    <li class="active"><a href="#">Levantamineto</a></li>
                    <li><a href="#">Cotizacion</a></li>
                    <li><a href="#">Atencion</a></li>
                    <li role="separator" class="divider"></li>


                    <li class="dropdown-header">Catalogos</li>
                    <li><a href="#" onclick="javascript: clientes.show();">Clientes</a></li>
                    <li><a href="#">Empleados</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li role="separator" class="divider"></li>

                    <!--
                    <li class="dropdown-header">Sample</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    -->
                </ul>
            </div>
        </div>
        <div class="col-sm-9" id="content">


            <!--
            <p>Move the needle inclusive improve the world white paper uplift co-create NGO thought provoking strengthening infrastructure. Leverage external partners move the needle energize save the world changemaker shared unit of analysis our work communities. Capacity building save the world shine commitment; deep dive low-hanging fruit innovate, indicators thought leader co-create because disrupt game-changer.</p>

            <p>Energize; energize global, social entrepreneurship social entrepreneur. Outcomes citizen-centered empathetic boots on the ground design thinking thought partnership but leverage co-creation save the world. Mobilize, communities; when movements, scale and impact scale and impact; agile then thought partnership state of play support. Capacity building empower communities, engaging social intrapreneurship, natural resources triple bottom line thought leadership or design thinking.</p>

            <p>Sustainable venture philanthropy; impact design thinking academic, families program area social impact thought partnership justice incubator gender rights milestones. Radical a her body her rights; storytelling our work equal opportunity resilient green space inspiring thought partnership parse. Indicators compelling outcomes entrepreneur, milestones, global low-hanging fruit targeted external partners thought leader overcome injustice challenges and opportunities. Justice radical move the needle scale and impact communities greenwashing. A, silo revolutionary strategize empower communities inspiring shine, improve the world strategize. Leverage; social enterprise, LGBTQ+, incubator shine inspiring parse game-changer systems thinking inclusion.</p>
            <p>Move the needle inclusive improve the world white paper uplift co-create NGO thought provoking strengthening infrastructure. Leverage external partners move the needle energize save the world changemaker shared unit of analysis our work communities. Capacity building save the world shine commitment; deep dive low-hanging fruit innovate, indicators thought leader co-create because disrupt game-changer.</p>

            <p>Energize; energize global, social entrepreneurship social entrepreneur. Outcomes citizen-centered empathetic boots on the ground design thinking thought partnership but leverage co-creation save the world. Mobilize, communities; when movements, scale and impact scale and impact; agile then thought partnership state of play support. Capacity building empower communities, engaging social intrapreneurship, natural resources triple bottom line thought leadership or design thinking.</p>

            <p>Sustainable venture philanthropy; impact design thinking academic, families program area social impact thought partnership justice incubator gender rights milestones. Radical a her body her rights; storytelling our work equal opportunity resilient green space inspiring thought partnership parse. Indicators compelling outcomes entrepreneur, milestones, global low-hanging fruit targeted external partners thought leader overcome injustice challenges and opportunities. Justice radical move the needle scale and impact communities greenwashing. A, silo revolutionary strategize empower communities inspiring shine, improve the world strategize. Leverage; social enterprise, LGBTQ+, incubator shine inspiring parse game-changer systems thinking inclusion.</p>
            -->
        </div>
    </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweet-alert.js"></script>
    <script src="js/scripts.js"></script>
<script>
    $(document).on("focusout","#InputPostal",function(){

        clientes.loadDomicilios();
    });

    $(document).on('keyup','#InputNeighborhood',function(){
        //alert(colonias);

        $( "#InputNeighborhood" ).autocomplete({
            source:colonias
        });
    });

</script>
</body>
</html>