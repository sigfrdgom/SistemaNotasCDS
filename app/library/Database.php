<?php
    /* Clase encarga de la conexion hacia la base de datos */
    class Database{
        private $db_host = DB_HOST;
        private $db_user = DB_USER;
        private $db_pass = DB_PASSWORD;
        private $db_name = DB_NAME;
        private $de_charset =  DB_CHARSET;

        private $db_handler; //Minipulador de DB
        private $stmt; //Statement sobre consultas
        private $error;

        public function __construct(){
            //configurar conexion
            $dsn = 'mysql:host=' . $this->db_host . ';dbname='. $this->db_name;
            $pdo_options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Crear una instancia de PDO
            try{
                $this->db_handler = new PDO($dsn, $this->db_user, $this->db_pass, $pdo_options);
                $this->db_handler->exec('set names utf8');
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        public function query($sql){
            $this->stmt = $this->db_handler->prepare($sql);
        }

        public function bind($parametro, $valor, $tipo = null){
            if(is_null($tipo)){
                switch (true) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }

        //Ejecutar la consulta
        public function execute(){
            return $this->stmt->execute();
        }

        //Obtener los registros
        public function findAll(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //Obtener un unico registro
        public function findOne(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Obtener la cantidad de registros de una tabla
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }
?>