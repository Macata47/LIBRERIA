<?php

$server = "127.0.0.1";
$database = "libreria";
$username = "root";
$password = "dba";



#.............CONNECT..............

// a. Estructuras basadas en procedimientos/método / (algoritmos/ funciones)

$mysqliPr = mysqli_connect($server, $username, $password, $database);

if(!$mysqliPr)
die("falló la conexión a la base de datos: ".$mysqliPr_connect_error());

// b. Estrctura basada en POO

$mysqlPoo = new mysqli($server, $username, $password, $database);

# ................TEST CONNECT .............

// a. procedimientos


// b. POO
// $mysqliPoo = new mysqli($server, $database, $username, $password);

// if(!$mysqliPoo->connect_error)
// die("falló la conexión a la base de datos: {$mysqliPoo ->connect_error}");


// ?>