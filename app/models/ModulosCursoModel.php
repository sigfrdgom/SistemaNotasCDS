<?php
class ModulosCursoModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM modulos_curso;");
        return $this->db->findAll();
    }


    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM modulos_curso LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findForTable(){
        $this->db->query("SELECT mc.id_modulos_curso , mc.id_curso, c.nombre_curso, mc.id_modulo, m.nombre_modulo, mc.id_docente, concat(d.nombres,' ',d.apellidos) as nombre, mc.observaciones 
        FROM modulos_curso mc JOIN  curso c ON mc.id_curso=c.id_curso 
        JOIN modulo m ON mc.id_modulo = m.id_modulo
        JOIN docente d ON mc.id_docente=d.id_docente ORDER BY m.nombre_modulo ASC;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM modulos_curso WHERE id_modulos_curso = :id ;");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO modulos_curso VALUES(:id_modulos_curso, :id_curso, :id_modulo, :id_docente, :observaciones) ;');
        $this->db->bind(':id_modulos_curso', $datos['id_modulos_curso']);
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_modulo',$datos['id_modulo']);
        $this->db->bind(':id_docente',$datos['id_docente']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE modulos_curso SET id_curso=:id_curso, id_modulo=:id_modulo, id_docente=:id_docente, observaciones=:observaciones WHERE id_modulos_curso = :id ;');
        $this->db->bind(':id',$datos['id_modulos_curso']);
        $this->db->bind(':id_curso',$datos['id_curso']);
        $this->db->bind(':id_modulo',$datos['id_modulo']);
        $this->db->bind(':id_docente',$datos['id_docente']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM modulos_curso WHERE id_modulos_curso = :id ;');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function findByCursoModulo($id_curso, $id_modulo){
        $this->db->query("SELECT * FROM modulos_curso WHERE id_curso=:id_curso AND id_modulo=:id_modulo;");
        $this->db->bind(':id_curso',$id_curso);
        $this->db->bind(':id_modulo',$id_modulo);
        return $this->db->findOne();
    }

    public function modulosByCurso($id_curso){
        $this->db->query("SELECT * FROM modulos_curso mc INNER JOIN modulo mo ON mo.id_modulo=mc.id_modulo WHERE id_curso=:id_curso ORDER BY tipo_modulo ASC;");
        $this->db->bind(':id_curso',$id_curso);
        return $this->db->findAll();
    }

    public function findByNivel($id_curso)
    {
        $this->db->query("SELECT mc.id_modulos_curso , mc.id_curso, c.nombre_curso, mc.id_modulo, m.nombre_modulo, mc.id_docente, concat(d.nombres,' ',d.apellidos) as nombre, mc.observaciones 
            FROM modulos_curso mc JOIN  curso c ON mc.id_curso=c.id_curso 
            JOIN modulo m ON mc.id_modulo = m.id_modulo
            JOIN docente d ON mc.id_docente=d.id_docente
            WHERE mc.id_curso=:id_curso  ORDER BY m.nombre_modulo ASC");
        $this->db->bind(':id_curso',$id_curso);
        return $this->db->findAll();
    }

    public function comprobar($datos)
    {
        $this->db->query('SELECT count(id_modulos_curso) as n_registros FROM modulos_curso WHERE id_curso = :id_curso AND id_modulo= :id_modulo ;');
        $this->db->bind(':id_curso', $datos['id_curso']);
        $this->db->bind(':id_modulo', $datos['id_modulo']);
        return $this->db->findAll();
    }
}
?>