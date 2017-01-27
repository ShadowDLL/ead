<?php
class alunos extends model{
    private $info;
    public function __construct(){
        parent::__construct();
    }
    public function isLogged(){
        return (isset($_SESSION['lgaluno']) && !empty($_SESSION['lgaluno']))?true:false;
    }
    public function login($email, $senha){
        $sql = "SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $_SESSION['lgaluno'] = $sql['id'];
            return true;
        }
        return false;
    }
    public function setAluno($id){
        $sql = "SELECT * FROM alunos WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $this->info = $sql->fetch();
        }
    }
    public function getNome(){
        return $this->info['nome'];
    }
    public function getId(){
        return $this->info['id'];
    }
    public function isInscrito($id){
        $sql = "SELECT * FROM aluno_curso WHERE id_curso = '$id' AND id_aluno = '".$this->info["id"]."'";
        $sql = $this->db->query($sql);
        return ($sql->rowCount() > 0)?true:false;
    }
    public function getAulasAssistidas($id_curso){
        $sql = "SELECT COUNT(historico.id) AS assistidas FROM historico INNER JOIN aulas ON aulas.id = historico.id_aula INNER JOIN cursos ON cursos.id = aulas.id_curso WHERE historico.id_aluno = '".($this->info['id'])."' AND cursos.id = '$id_curso'";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql->rowCount();
    }
}

