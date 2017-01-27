<?php
class cursos extends model{
    private $info;
    public function __construct() {
        parent::__construct();
    }
    public function getCursosDoAluno($id){
        $sql = "SELECT * FROM aluno_curso LEFT JOIN cursos ON aluno_curso.id_curso = cursos.id WHERE aluno_curso.id_aluno = 1";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function setCurso($id){
        $sql = "SELECT * FROM cursos WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $this->info = $sql->fetch();
        }
    }
    public function getNome(){
        return $this->info['nome'];
    }
    public function getImagem(){
        return $this->info['imagem'];
    }
    public function getDescricao(){
        return $this->info['descricao'];
    }
    public function getTotalAulasCurso(){
        $sql = $this->db->query("SELECT id FROM aulas WHERE id_curso = '".($this->info['id'])."'");
        $sql = $sql->fetchAll();
        return $sql->rowCount();
    }
}

