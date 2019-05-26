<?php
class TipoModuloModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM tipo_modulo;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM  WHERE id_tipo_modulo = :id");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO tipo_modulo FROM VALUES(:id_tipo_modulo, :nombre, :estado)');
        $this->db->bind(':nombre',$datos['nombre']);
        $this->db->bind(':estado', $datos['estado']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE tipo_modulo SET nombre = :nombre, estado = :estado WHERE id_tipo_modulo = :id ');
        $this->db->bind(':id', $datos['id_tipo_modulo']);
        $this->db->bind(':nombre'. $datos['nombre']);
        $this->db->bind(':estado', $datos['estado']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM tipo_modulo WHERE id_tipo_modulo = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>