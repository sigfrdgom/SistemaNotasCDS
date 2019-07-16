<?php
class NotaModel{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findAll(){
        $this->db->query("SELECT * FROM nota;");
        return $this->db->findAll();
    }

    public function findById($id = ""){
        $this->db->query("SELECT * FROM nota WHERE id_nota = :id ;");
        $this->db->bind(':id',$id);
        return $this->db->findOne();
    }

    public function findByRange($inicio, $maxResult){
        $this->db->query("SELECT * FROM nota LIMIT :inicio, :maxResult");
        $this->db->bind(':inicio',$inicio, PDO::PARAM_INT);
        $this->db->bind(':maxResult',$maxResult, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function count(){
        $this->db->query("SELECT COUNT(*) AS n_registros FROM nota;");
        return $this->db->findAll();
    }

    public function create($datos){
        $this->db->query('INSERT INTO nota VALUES(:id_nota, :id_participante, :id_modulos_curso, :nota1, :nota2, :nota3, :nota4, :nota5, :nota6, :observaciones) ;');
        $this->db->bind(':id_nota',null);
        $this->db->bind(':id_participante',$datos['id_participante']);
        $this->db->bind(':id_modulos_curso',$datos['id_modulos_curso']);
        $this->db->bind(':nota1',$datos['nota1']);
        $this->db->bind(':nota2',$datos['nota2']);
        $this->db->bind(':nota3',$datos['nota3']);
        $this->db->bind(':nota4',$datos['nota4']);
        $this->db->bind(':nota5',$datos['nota5']);
        $this->db->bind(':nota6',$datos['nota6']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function replace($datos){
        $this->db->query('REPLACE INTO nota VALUES(:id_nota, :id_participante, :id_modulos_curso, :nota1, :nota2, :nota3, :nota4, :nota5, :nota6, :observaciones) ;');
        $this->db->bind(':id_nota',$datos['id_nota']);
        $this->db->bind(':id_participante',$datos['id_participante']);
        $this->db->bind(':id_modulos_curso',$datos['id_modulos_curso']);
        $this->db->bind(':nota1',$datos['nota1']);
        $this->db->bind(':nota2',$datos['nota2']);
        $this->db->bind(':nota3',$datos['nota3']);
        $this->db->bind(':nota4',$datos['nota4']);
        $this->db->bind(':nota5',$datos['nota5']);
        $this->db->bind(':nota6',$datos['nota6']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($datos){
        $this->db->query('UPDATE nota SET id_participante=:id_participante, id_modulos_curso=:id_modulos_curso, notas_modulo=:notas_modulo, nota_final=:nota_final, observaciones=:observaciones WHERE id_nota = :id ;');
        $this->db->bind(':id_participante',$datos['id_participante']);
        $this->db->bind(':id_modulos_curso',$datos['id_modulos_curso']);
        $this->db->bind(':notas_modulo',$datos['notas_modulo']);
        $this->db->bind(':nota_final',$datos['notas_final']);
        $this->db->bind(':observaciones',$datos['observaciones']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id = ""){
        $this->db->query('DELETE FROM nota WHERE id_nota = :id ;');
        $this->db->bind(':id', $id);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function findByCursoModulo($id_curso, $id_modulo){
        $this->db->query("SELECT * FROM nota n INNER JOIN modulos_curso mc ON n.id_modulos_curso=mc.id_modulos_curso INNER JOIN modulo m ON mc.id_modulo=m.id_modulo INNER JOIN curso c ON mc.id_curso=c.id_curso;");
        $this->db->bind(':id_curso',$id_curso);
        $this->db->bind(':id_modulo',$id_modulo);
        return $this->db->findAll();
    }

    public function findNotasEstudiantes($datos){
        $this->db->query('SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente, mo.evaluacion1, mo.evaluacion2, mo.evaluacion3, mo.evaluacion4, mo.evaluacion5, mo.evaluacion6 FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo INNER JOIN matricula ma ON ma.id_curso=c.id_curso AND ma.id_participante=p.id_participante WHERE ma.id_curso=:id_curso AND mc.id_modulo=:id_modulo AND c.estado=1 AND mo.estado=1 ');
        $this->db->bind(':id_curso', $datos['id_curso'],PDO::PARAM_INT);
        $this->db->bind(':id_modulo', $datos['id_modulo'],PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findByParticipante($id_curso, $id_modulo, $busqueda){
        $this->db->query("SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente, mo.evaluacion1, mo.evaluacion2, mo.evaluacion3, mo.evaluacion4, mo.evaluacion5, mo.evaluacion6 FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo WHERE mc.id_curso=:id_curso AND mc.id_modulo=:id_modulo AND (p.nombres LIKE :nombres OR p.apellidos LIKE :apellidos) AND c.estado=1 AND mo.estado=1");
        $this->db->bind(':id_curso',$id_curso,PDO::PARAM_INT);
        $this->db->bind(':id_modulo', $id_modulo,PDO::PARAM_INT);
        $busqueda = "%{$busqueda}%";
        $this->db->bind(':nombres', $busqueda, PDO::PARAM_STR);
        $this->db->bind(':apellidos', $busqueda, PDO::PARAM_STR);
        return $this->db->findAll();
    }

    public function findNotasByCursoModuloNivel($id_curso,$id_modulo,$id_nivel){
        $this->db->query("SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente, mo.evaluacion1, mo.evaluacion2, mo.evaluacion3, mo.evaluacion4, mo.evaluacion5, mo.evaluacion6 FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo INNER JOIN matricula ma ON ma.id_curso=c.id_curso AND ma.id_participante=p.id_participante WHERE mc.id_curso=:id_curso AND mc.id_modulo=:id_modulo AND c.nivel=:id_nivel ;");
        $this->db->bind(':id_curso',$id_curso, PDO::PARAM_INT);
        $this->db->bind(':id_modulo',$id_modulo, PDO::PARAM_INT);
        $this->db->bind(':id_nivel',$id_nivel, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findNotasByCursoPorcenatejeNivelTop($id_curso,$id_nivel){
        $this->db->query("SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente, mo.evaluacion1, mo.evaluacion2, mo.evaluacion3, mo.evaluacion4, mo.evaluacion5, mo.evaluacion6, pc.id_tipo_modulo, pc.porcentaje, tm.nombre FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo INNER JOIN matricula ma ON ma.id_curso=c.id_curso AND ma.id_participante=p.id_participante INNER JOIN porcentajes_curso pc ON c.id_curso=pc.id_curso INNER JOIN tipo_modulo tm ON pc.id_tipo_modulo=tm.id_tipo_modulo AND mo.tipo_modulo=tm.id_tipo_modulo WHERE mc.id_curso=:id_curso AND c.nivel=:id_nivel AND tm.estado=1;");
        $this->db->bind(':id_curso',$id_curso, PDO::PARAM_INT);
        $this->db->bind(':id_nivel',$id_nivel, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findNotasByCursoPorcenatejeNivelTopParticipante($id_curso,$id_nivel,$id_participante){
        $this->db->query("SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente, mo.evaluacion1, mo.evaluacion2, mo.evaluacion3, mo.evaluacion4, mo.evaluacion5, mo.evaluacion6, pc.id_tipo_modulo, pc.porcentaje, tm.nombre FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo INNER JOIN matricula ma ON ma.id_curso=c.id_curso AND ma.id_participante=p.id_participante INNER JOIN porcentajes_curso pc ON c.id_curso=pc.id_curso INNER JOIN tipo_modulo tm ON pc.id_tipo_modulo=tm.id_tipo_modulo AND mo.tipo_modulo=tm.id_tipo_modulo WHERE mc.id_curso=:id_curso AND c.nivel=:id_nivel AND tm.estado=1 AND n.id_participante = :id_participante;");
        $this->db->bind(':id_curso',$id_curso, PDO::PARAM_INT);
        $this->db->bind(':id_nivel',$id_nivel, PDO::PARAM_INT);
        $this->db->bind(':id_participante',$id_participante, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findNotasByCursoTipoModulo($id_curso,$id_tipo_modulo,$id_nivel){
        $this->db->query("SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente, mo.evaluacion1, mo.evaluacion2, mo.evaluacion3, mo.evaluacion4, mo.evaluacion5, mo.evaluacion6, pc.id_tipo_modulo, pc.porcentaje, tm.nombre FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo INNER JOIN matricula ma ON ma.id_curso=c.id_curso AND ma.id_participante=p.id_participante INNER JOIN porcentajes_curso pc ON c.id_curso=pc.id_curso INNER JOIN tipo_modulo tm ON pc.id_tipo_modulo=tm.id_tipo_modulo AND mo.tipo_modulo=tm.id_tipo_modulo WHERE mc.id_curso=:id_curso AND c.nivel=:id_nivel AND mo.tipo_modulo=:id_tipo_modulo AND tm.estado=1;");
        $this->db->bind(':id_curso',$id_curso, PDO::PARAM_INT);
        $this->db->bind(':id_tipo_modulo',$id_tipo_modulo, PDO::PARAM_INT);
        $this->db->bind(':id_nivel',$id_nivel, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function findNotasByCursoModuloNivelParticipante($id_curso,$id_modulo,$id_nivel,$id_participante){
        $this->db->query("SELECT n.id_nota, n.id_participante, n.id_modulos_curso, n.nota1, n.nota2, n.nota3, n.nota4, n.nota4, n.nota5, n.nota6, n.observaciones, p.nombres, p.apellidos, mc.id_curso, mc.id_modulo, mc.id_docente, mo.evaluacion1, mo.evaluacion2, mo.evaluacion3, mo.evaluacion4, mo.evaluacion5, mo.evaluacion6, mo.nombre_modulo FROM participante p INNER JOIN nota n ON p.id_participante = n.id_participante INNER JOIN modulos_curso mc ON n.id_modulos_curso= mc.id_modulos_curso INNER JOIN curso c ON mc.id_curso = c.id_curso INNER JOIN modulo mo ON mc.id_modulo=mo.id_modulo INNER JOIN matricula ma ON ma.id_curso=c.id_curso AND ma.id_participante=p.id_participante WHERE mc.id_curso=:id_curso AND mc.id_modulo=:id_modulo AND c.nivel=:id_nivel AND n.id_participante=:id_participante;");
        $this->db->bind(':id_curso',$id_curso, PDO::PARAM_INT);
        $this->db->bind(':id_modulo',$id_modulo, PDO::PARAM_INT);
        $this->db->bind(':id_nivel',$id_nivel, PDO::PARAM_INT);
        $this->db->bind(':id_participante',$id_participante, PDO::PARAM_INT);
        return $this->db->findAll();
    }
}
?>