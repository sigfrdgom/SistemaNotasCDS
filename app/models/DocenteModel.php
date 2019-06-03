<?php
class DocenteModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM docente ;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM docente WHERE id_docente = :id");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO docente VALUES(:id_docente, :nombres, :apellidos, :fecha_nacimiento, :sexo, :dui, :nit, :especialidad, :tipo_usuario, :pass, :estado)');
        $this->db->bind(':id_docente',null);
        $this->db->bind(':nombres',$datos['nombres']);
        $this->db->bind(':apellidos',$datos['apellidos']);
        $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
        $this->db->bind(':sexo',$datos['sexo']);
        $this->db->bind(':dui',$datos['dui']);
        $this->db->bind(':nit',$datos['nit']);
        $this->db->bind(':especialidad',$datos['especialidad']);
        $this->db->bind(':tipo_usuario',$datos['tipo_usuario']);
        $this->db->bind(':pass',$datos['pass']);
        $this->db->bind(':estado',$datos['estado']);
        
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE docente SET nombres=:nombres, apellidos=:apellidos, fecha_nacimiento=:fecha_nacimiento, sexo=:sexo, dui=:dui, nit=:nit, especialidad=:especialidad, tipo_usuario=:tipo_usuario, pass=:pass, estado=:estado WHERE id_docente = :id ');
        $this->db->bind(':id', $datos['id_docente']);
        $this->db->bind(':nombres',$datos['nombres']);
        $this->db->bind(':apellidos',$datos['apellidos']);
        $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
        $this->db->bind(':sexo',$datos['sexo']);
        $this->db->bind(':dui',$datos['dui']);
        $this->db->bind(':nit',$datos['nit']);
        $this->db->bind(':especialidad',$datos['especialidad']);
        $this->db->bind(':tipo_usuario',$datos['tipo_usuario']);
        $this->db->bind(':pass',$datos['pass']);
        $this->db->bind(':estado',$datos['estado']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM docente WHERE id_docente = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateDown($datos){
        $this->db->query('UPDATE docente SET estado=0 WHERE id_docente = :id ');
         $this->db->bind(':id', $datos['id']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>