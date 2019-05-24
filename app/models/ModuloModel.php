<?php
class ModuloModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM modulo;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM  WHERE id_modulo = :id");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO modulo FROM VALUES(:id_modulo, :nombre_modulo, :descripcion_modulo, :horas_modulo, :tipo_modulo, :evaluaciones)');
        $this->db->bind(':id', $datos['id_modulo']);
        $this->db->bind(':nombre_modulo',$datos['nombre_modulo']);
        $this->db->bind(':descripcion_modulo', $datos['descripcion_modulo']);
        $this->db->bind(':horas_modulo', $datos['horas_modulo']);
        $this->db->bind(':tipo_modulo',$datos['tipo_modulo']);
        $this->db->bind(':evaluaciones', $datos['evaluaciones']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE modulo SET nombre = :nombre, estado = :estado WHERE id_modulo = :id ');
        $this->db->bind(':id', $datos['id_modulo']);
        $this->db->bind(':nombre_modulo',$datos['nombre_modulo']);
        $this->db->bind(':descripcion_modulo', $datos['descripcion_modulo']);
        $this->db->bind(':horas_modulo', $datos['horas_modulo']);
        $this->db->bind(':tipo_modulo',$datos['tipo_modulo']);
        $this->db->bind(':evaluaciones', $datos['evaluaciones']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM modulo WHERE id_modulo = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>