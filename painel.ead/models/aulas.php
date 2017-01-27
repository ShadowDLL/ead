<?php
class aulas extends model{
    public function __construct() {
        parent::__construct();
    }
    public function getAulasDoModulo($id){
        $array = array();
        $sql = "SELECT * FROM aulas WHERE id_modulo = '$id' ORDER BY ordem";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            foreach ($array as $key => $value) {
                if ($array[$key]['tipo'] == 'video') {
                    $sql = "SELECT nome FROM videos WHERE id_aula = '".$value['id']."'";
                    $sql = $this->db->query($sql)->fetch();
                    $array[$key]['nome'] = $sql['nome'];
                }
                elseif($array[$key]['tipo'] == 'poll'){
                    $array[$key]['nome'] = "Questionário";
                }
            }
        }
        return $array;
    }
    public function getCursoDeAula($id_aula){
        $sql = "SELECT id_curso FROM aulas WHERE id = '$id_aula'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['id_curso'];
        }
        else{
            return 0;
        }
    }
    public function getAula($id_aula){
        $array = array();
        $sql = "SELECT * FROM aulas WHERE id = '$id_aula'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            if ($array['tipo'] == "video") {
                $sql = "SELECT * FROM videos WHERE id_aula = '".$array['id']."'";
                $sql = $this->db->query($sql);
                $array['video'] = $sql->fetch();
            }
            else{
                $sql = "SELECT * FROM questionarios WHERE id_aula = '".$array['id']."'";
                $sql = $this->db->query($sql);
                $array['questionario'] = $sql->fetch();
            }
        }
        return $array;
    }
    public function addAula($aula, $id_modulo, $tipo){
        $id_curso = "";
        $ordem = "";
        $sql = "SELECT id_curso FROM modulos WHERE id = '$id_modulo'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id_curso = $sql['id_curso'];
        }
        $sql = "SELECT MAX(ordem+1) AS ordem FROM aulas WHERE id_modulo = '1' AND id_curso = '1'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $ordem = $sql['ordem'];
        }
        $sql = "INSERT INTO aulas SET id_modulo = '$id_modulo', id_curso = '$id_curso', ordem = '$ordem', tipo = '$tipo'";
        $this->db->query($sql);
        $id_aula = $this->db->lastInsertId();
        if ($tipo == "video") {
            $this->db->query("INSERT INTO videos SET id_aula = '$id_aula', nome = '$aula'");
        }else{
            $this->db->query("INSERT INTO questionarios SET id_aula = '$id_aula'");
        }
    }

    private function getIdCurso($id_aula){
        $sql = "SELECT id_curso FROM aulas WHERE id = '$id_aula'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['id_curso'];
        }
        else{
            return '';
        }
    }

    public function setVideoAula($id, $tituloVideo, $descricao, $url){
        $sql = "UPDATE videos SET nome = '$tituloVideo', descricao = '$descricao', url = '$url' WHERE id_aula = '$id'";
        $this->db->query($sql);
        return $this->getIdCurso($id);
    }

    public function setQuestionarioAula($id, $pergunta, $op1, $op2, $op3, $op4, $resposta){
        $sql = "UPDATE questionarios SET pergunta = '$pergunta', opcao1 = '$op1', opcao2 = '$op2', opcao3 = '$op3', opcao4 = '$op4', resposta = '$resposta' WHERE id_aula = '$id'";
        $this->db->query($sql);
        return $this->getIdCurso($id);
    }


    public function delAula($id){
        $sql = "SELECT id_curso FROM aulas WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $this->db->query("DELETE FROM questionarios WHERE id_aula = '$id'");
            $this->db->query("DELETE FROM videos WHERE id_aula = '$id'");
            $this->db->query("DELETE FROM historico WHERE id_aula = '$id'");
            $this->db->query("DELETE FROM aulas WHERE id = '$id'");
            return $sql['id_curso'];
        }
    }
}
