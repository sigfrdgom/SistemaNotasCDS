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

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM modulo LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function create($datos){
        $this->db->query('INSERT INTO modulo  VALUES(:id_modulo, :nombre_modulo, :descripcion_modulo, :horas_modulo, :tipo_modulo, :evaluacion1, :evaluacion2, :evaluacion3, :evaluacion4, :evaluacion5, :evaluacion6, :estado)');
        $this->db->bind(':id_modulo', $datos['id_modulo']);
        $this->db->bind(':nombre_modulo',$datos['nombre_modulo']);
        $this->db->bind(':descripcion_modulo', $datos['descripcion_modulo']);
        $this->db->bind(':horas_modulo', $datos['horas_modulo']);
        $this->db->bind(':tipo_modulo',$datos['tipo_modulo']);
        $this->db->bind(':evaluacion1', $datos['evaluacion1']);
        $this->db->bind(':evaluacion2', $datos['evaluacion2']);
        $this->db->bind(':evaluacion3', $datos['evaluacion3']);
        $this->db->bind(':evaluacion4', $datos['evaluacion4']);
        $this->db->bind(':evaluacion5', $datos['evaluacion5']);
        $this->db->bind(':evaluacion6', $datos['evaluacion6']);
        $this->db->bind(':estado', $datos['estado']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE modulo SET nombre_modulo = :nombre_modulo, descripcion_modulo = :descripcion_modulo, horas_modulo=:horas_modulo, tipo_modulo=:tipo_modulo, evaluacion1=:evaluacion1, evaluacion2=:evaluacion2, evaluacion3=:evaluacion3, evaluacion4=:evaluacion4, evaluacion4=:evaluacion4, evaluacion6=:evaluacion6, estado = :estado WHERE id_modulo = :id ');
        $this->db->bind(':id', $datos['id_modulo']);
        $this->db->bind(':nombre_modulo',$datos['nombre_modulo']);
        $this->db->bind(':descripcion_modulo', $datos['descripcion_modulo']);
        $this->db->bind(':horas_modulo', $datos['horas_modulo']);
        $this->db->bind(':tipo_modulo',$datos['tipo_modulo']);
        $this->db->bind(':evaluacion1', $datos['evaluacion1']);
        $this->db->bind(':evaluacion2', $datos['evaluacion2']);
        $this->db->bind(':evaluacion3', $datos['evaluacion3']);
        $this->db->bind(':evaluacion4', $datos['evaluacion4']);
        $this->db->bind(':evaluacion5', $datos['evaluacion5']);
        $this->db->bind(':evaluacion6', $datos['evaluacion6']);
        $this->db->bind(':estado', $datos['estado']);
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
    
    public function updateDown($datos){
        $this->db->query('UPDATE modulo SET estado=0 WHERE id_modulo = :id ');
        $this->db->bind(':id', $datos['id']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function findbyIdCurso($id = ""){
        $this->db->query("SELECT * FROM modulo m JOIN modulos_curso mc ON m.id_modulo=mc.id_modulo WHERE mc.id_curso=:id;");
        $this->db->bind(':id', $id);
        return $this->db->findAll();
    }
}
?>