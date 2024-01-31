<?php

namespace App\Controllers;
use Database\PDO\DatabaseConnection;
use Exception;

require "vendor/autoload.php";

class BookShopController{
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;

    //funcion constructora dde llamada a base de datos
    public function __construct()
    {
        $this -> server = '127.0.0.1';
        $this -> database = 'libreria';
        $this -> username = 'root';
        $this -> password = ''; 

    
        
    //instanciar el objeto de la conexion
    $this->connection = new DatabaseConnection($this->server, $this->database,
                                                $this->username, $this->password);

    //conertar la base de datos
    $this -> connection -> connect();

    }



/**
 * INDEX: Muestra/selecciona listas/colecciones/indice de todos los registros de una entidad dada.
 */

 public function index(){

 }

/**
 * CREATE: Vista/muestra de un formulario que permite capturar la data de un elelmento dado
 */

 public function create(){

 }

/**
 * STORE: Inserta en la base de datos lo que recibe del formulario de CREATE.
 */

 public function store($data){
  //construir consulta
    $query = "INSERT INTO libros (titulo, autor, genero, precio)
                VALUES (?, ?, ?, ?)";

try{
    //Ejecutar la consulta
    $statement = $this->connection->get_connection()->prepare($query);
    $results = $statement->execute([$data['titulo'], $data['autor'],
                                            $data['genero'], $data['precio']
                                            ]);
    if(!empty($results)){
        $response = "Se ha registrado con éxito el libro {$data['titulo']} en la base de datos";
        var_dump($response);
        return [$results, $response];
    }
}catch(Exception $e){
    echo "Ocurrio un error en el registro, vuelve a intentarlo";
}


}









/**
 * SHOW: Muestra/selecciona un elemento dado.
 */

 public function show(){

 }

/**
 * EDIT: Muestra un formulario que permita modificar los datos de un elemento seleccionado
 */

 public function edit(){

 }

/**
 * UPDATE: Actualiza en la base de datos lo que recibe del formulario de EDIT.
 */

 public function update(){

 }

/**
 * DELETE: Elimina un elemento dado.
 */

 public function delete(){

 }
    
}


?>