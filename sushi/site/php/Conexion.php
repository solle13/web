<?php  
require_once "DatosDB.php"; 

class Conexion{ 
    protected $Base; 

    public function __construct(){ 
        $this ->Base = new mysqli(host, user, pass, db); 
        if ( $this ->Base->connect_errno ){ 
            echo "Fallo al conectar a MySQL: ". $this ->Base ->connect_error; 
            return;     
        } 
        $this ->Base ->set_charset('DB_CHARSET'); 
    } 
    public function __destruct() {
        $this ->CloseDB();
        }
    public function CloseDB() {
        $this->Base->close();
        }
} 
?> 