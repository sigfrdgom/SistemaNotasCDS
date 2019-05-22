<?php
    class Ejemplo{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function obtenerUsuarios(){
            $this->db->query("SELECT * FROM usuarios;");
            return $this->db->findAll();
        }
    }
?>