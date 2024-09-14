<?
// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');
include('conecta.php');

// Accessing clients data
// $results = api_request('get_all_clients', 'POST', ['only_active' => true]);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  -->
    <style>
        .dropdown-menu .submenu {
            position: absolute;
            top: 0;
            left: 100%;
            margin-top: -1px;
            display: none;
        }

        .dropdown-menu .submenu.show {
            display: block;
        }

        .dropdown-menu li:hover .submenu {
            display: block;
        }

        .clickable-row { 
          cursor: pointer;
        }

    </style>
</head>
<body>
    <!-- <input type="text" name="page" id="page" value=""> -->
    <!-- <span id="page"></span> -->
    <?
    if(!isset($_GET['page'])) $_GET['page'] = 'inicio.php';

    include('nav.php');

    include("$_GET[page]");
    ?>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>