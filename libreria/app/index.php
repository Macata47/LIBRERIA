<?php

use App\Controllers\BookShopController;
require "vendor/autoload.php"; //permite usar composer

$bookShop = new BookShopController();

$bookShop -> store([
    "titulo" => "Dos tontos muy tontos",
    "autor" => "Anonimo",
    "genero" => "Comedia",
    "precio" => 35
]);


?>