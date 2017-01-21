<?php
class cursos extends model{
    public function __construct() {
        parent::__construct();
    }
    public function getCursos(){
        $array = array();
        $sql = "SELECT *,(SELECT COUNT(id) FROM aluno_curso WHERE aluno_curso.id = cursos.id) AS qtd_alunos FROM cursos";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
}

