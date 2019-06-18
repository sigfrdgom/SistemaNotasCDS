<?php
class ParticipanteModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM participante ;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM participante WHERE id_participante = :id ;");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM participante LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function create($datos){
        $this->db->query('INSERT INTO participante VALUES(:id_participante, :nombres, :apellidos, :fecha_nacimiento, :sexo, :dui, :nit, :carnet_minoridad, :direccion, :telefono, :email, :pass, :estado) ;');
        $this->db->bind(':id_participante',null);
        $this->db->bind(':nombres',$datos['nombres']);
        $this->db->bind(':apellidos',$datos['apellidos']);
        $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
        $this->db->bind(':sexo',$datos['sexo']);
        $this->db->bind(':dui',$datos['dui']);
        $this->db->bind(':nit',$datos['nit']);
        $this->db->bind(':carnet_minoridad',$datos['carnet_minoridad']);
        $this->db->bind(':direccion',$datos['direccion']);
        $this->db->bind(':telefono',$datos['telefono']);
        $this->db->bind(':email',$datos['email']);
        $this->db->bind(':pass',$datos['pass']);
        $this->db->bind(':estado',$datos['estado']);
        
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE participante SET nombres=:nombres, apellidos=:apellidos, fecha_nacimiento=:fecha_nacimiento, sexo=:sexo, dui=:dui, nit=:nit, carnet_minoridad=:carnet_minoridad, direccion=:direccion, telefono=:telefono, email=:email, estado=:estado WHERE id_participante=:id;');
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombres',$datos['nombres']);
        $this->db->bind(':apellidos',$datos['apellidos']);
        $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
        $this->db->bind(':sexo',$datos['sexo']);
        $this->db->bind(':dui',$datos['dui']);
        $this->db->bind(':nit',$datos['nit']);
        $this->db->bind(':carnet_minoridad',$datos['carnet_minoridad']);
        $this->db->bind(':direccion',$datos['direccion']);
        $this->db->bind(':telefono',$datos['telefono']);
        $this->db->bind(':email',$datos['email']);
        // $this->db->bind(':pass',$datos['pass']);
        $this->db->bind(':estado',$datos['estado']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM participante WHERE id_participante = :id ;');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function participantesByModulo($datos){
        //$this->db->query("SELECT * FROM participante p INNER JOIN matricula m ON p.id_participante=m.id_participante INNER JOIN curso c ON m.id_curso=c.id_curso INNER JOIN modulos_curso mc ON c.id_curso=mc.id_curso WHERE mc.id_modulo=:id_modulo AND mc.id_curso=:id_curso;");
        $this->db->query('SELECT * FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo WHERE mc.id_curso=:id_curso AND mc.id_modulo=:id_modulo AND c.estado=1 AND mo.estado=1');
        $this->db->bind(':id_curso', $datos['id_curso']);
        $this->db->bind(':id_modulo', $datos['id_modulo']);
        return $this->db->findAll();
    }


}
?>