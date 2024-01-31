<?php

//TODO ESTO ES UNA LLAMADA A LA BASE DE DATOS TOTALMENTE REUTILIZABLE

namespace Database\PDO; //apellidos de la clase

class DatabaseConnection{
    //estas variables estan definidas por la clase, a las que les asignamos los valores dentro del constructor (abajo).
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;
    
    //Estas vienen de otros lugares (de fuera).No son las de arriba.No llega la info por la clase de arriba.
    public function __construct($server, $database, $username, $password)
    {
        //Aqui ya igualamos las variables de arriba con los datos que vienen de fuera.
        $this -> server = $server;
        $this -> database = $database;
        $this -> username = $username;
        $this -> password = $password;
        
        

    }
    
    public function connect(){
        try{
            //conectate a la base de datos a través de conexión PDO con estos DNS y valores.
           $this->connection = new \PDO("mysql:host=$this->server;dbname=$this->database",
                                        $this->username,$this->password);
    
            $this->connection -> setAttribute(\PDO::ATTR_ERRMODE,
                                              \PDO::ERRMODE_EXCEPTION);
            $this->connection -> setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection -> exec("SET NAMES 'utf8'");

            //si no puedes conectarte dime por qué motivo.
        }catch(\PDOException $e){
            echo "falló la conexión a la base de datos: " . $e->getMessage();
        }
    }
    // para hacer pública y manipular la conexión. 
    public function get_connection(){
        return $this-> connection;
    }
}

// $server = 'localhost';
// $database = 'libreria';
// $username = 'root';
// $password = 'GGG444777CCC'; 

// //instanciar el objeto de la conexión.
// $databaseConnection = new DatabaseConnection($server, $username, $password, $database);
// //conectar a la base de datos
// $databaseConnection -> connect();

// //Ejecutar la consulta.
// $query = 'SELECT * FROM libros';

// $results = $databaseConnection -> get_connection() -> query($query);
// //var_dump($results);

// foreach($results as $row){
//     echo $row['titulo']. "\n";
// }


// ?>