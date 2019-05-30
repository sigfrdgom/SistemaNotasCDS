<?php
class PorcentajesCursoModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM porcentajes_curso;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM  WHERE id_porcentajes_curso = :id");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO porcentajes_curso VALUES(:id_porcentajes_curso, :id_curso, :id_tipo_modulo, :porcentaje, :observacion)');
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_tipo_modulo', $datos['id_tipo_modulo']);
        $this->db->bind(':porcentaje', $datos['porcentaje']);
        $this->db->bind(':observacion', $datos['observacion']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE porcentajes_curso SET nombre = :nombre, estado = :estado WHERE id_porcentajes_curso = :id ');
        $this->db->bind(':id', $datos['id_porcentajes_curso']);
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_tipo_modulo', $datos['id_tipo_modulo']);
        $this->db->bind(':porcentaje', $datos['porcentaje']);
        $this->db->bind(':observacion', $datos['observacion']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM porcentajes_curso WHERE id_porcentajes_curso = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>
