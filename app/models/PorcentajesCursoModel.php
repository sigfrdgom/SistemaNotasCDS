<?php
class PorcentajesCursoModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM porcentajes_curso ORDER BY id_curso ASC;");
        return $this->db->findAll();
    }

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM porcentajes_curso LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findForTable(){
        $this->db->query("SELECT pm.id_porcentajes_curso, pm.id_curso, c.nombre_curso, pm.id_tipo_modulo, tm.nombre, pm.porcentaje, pm.observacion 
        FROM porcentajes_curso pm JOIN curso c ON pm.id_curso=c.id_curso JOIN tipo_modulo tm ON pm.id_tipo_modulo=tm.id_tipo_modulo ORDER BY id_curso DESC ;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM porcentajes_curso WHERE id_porcentajes_curso = :id");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function create($datos){
        $this->db->query('INSERT INTO porcentajes_curso VALUES(:id_porcentajes_curso, :id_curso, :id_tipo_modulo, :porcentaje, :observacion)');
        $this->db->bind(':id_porcentajes_curso',null);
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

    public function replace($datos){
        $this->db->query('REPLACE INTO porcentajes_curso VALUES(:id_porcentajes_curso, :id_curso, :id_tipo_modulo, :porcentaje, :observacion)');
        $this->db->bind(':id_porcentajes_curso',$datos['id_porcentajes_curso']);
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
        $this->db->query('UPDATE porcentajes_curso SET id_curso = :id_curso, id_tipo_modulo = :id_tipo_modulo , porcentaje = :porcentaje , observacion = :observacion WHERE id_porcentajes_curso = :id ');
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

    public function findByNivel($id_curso){
        $this->db->query("SELECT pm.id_porcentajes_curso, pm.id_curso, c.nombre_curso, pm.id_tipo_modulo, tm.nombre, pm.porcentaje, pm.observacion 
        FROM porcentajes_curso pm JOIN curso c ON pm.id_curso=c.id_curso JOIN tipo_modulo tm ON pm.id_tipo_modulo=tm.id_tipo_modulo 
        WHERE pm.id_curso = :id_curso
        ORDER BY id_curso DESC ;");
         $this->db->bind(':id_curso', $id_curso);
        return $this->db->findAll();
    }

    public function porcentajesTipoModulo($id_curso){
        $this->db->query("SELECT * FROM porcentajes_curso pc INNER JOIN tipo_modulo tm ON pc.id_tipo_modulo=tm.id_tipo_modulo WHERE pc.id_curso=:id_curso");
        $this->db->bind(':id_curso', $id_curso);
        return $this->db->findAll();
    }

}

?>
