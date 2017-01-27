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
    public function getCurso($id){
        $array = array();
        $sql = "SELECT * FROM cursos WHERE  id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }


    public function getInscrito($id_aluno){
        $array = array();
        $sql = "SELECT id_curso FROM aluno_curso WHERE id_aluno = '$id_aluno'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();
            foreach($sql as $id_curso){
                $array[] = $id_curso['id_curso'];
            }
        }
        return $array;
    }


    public function del($id){
    $sql = "SELECT id FROM aulas WHERE id_curso = '$id'";
    $sql = $this->db->query($sql);
    if ($sql->rowCount() > 0) {
        $aulas = $sql->fetchAll();
        foreach ($aulas as $aula) {
            $sql = "DELETE FROM historico WHERE id_aula = '".$aula['id_aula']."'";
            $this->db->query($sql);
            $sql = "DELETE FROM videos WHERE id_aula = '".$aula['id_aula']."'";
            $this->db->query($sql);
            $sql = "DELETE FROM questionarios WHERE id_aula = '".$aula['id_aula']."'";
            $this->db->query($sql);
        }
    }
    $sql = "DELETE FROM aluno_curso WHERE id_curso = '$id'";
    $this->db->query($sql);
    
    $sql = "DELETE FROM aulas WHERE id_curso = '$id'";
    $this->db->query($sql);
    
    $sql = "DELETE FROM modulos WHERE id_curso = '$id'";
    $this->db->query($sql);
    
    $sql = "DELETE FROM cursos WHERE id = '$id'";
    $this->db->query($sql);
}
public function edit($id, $nome, $descricao){
    $sql = "UPDATE cursos SET nome = '$nome', descricao = '$descricao' WHERE id = '$id'";
    $this->db->query($sql);
}
public function updateImage($id, $imagem){
    $sql = "UPDATE cursos SET imagem = '$imagem' WHERE id = '$id'";
    $this->db->query($sql);
}
public function add($nome, $imagem, $descricao){
    $sql = "INSERT INTO cursos SET nome = '$nome', imagem = '$imagem', descricao = '$descricao'";
    $this->db->query($sql);
}
}

