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
        $id_aluno = $_SESSION['lgaluno'];
        
        $sql = "SELECT tipo, (SELECT count(*) FROM historico WHERE historico.id_aula = '$id_aula' AND historico.id_aluno = '$id_aluno') AS assistido FROM aulas WHERE id = '$id_aula'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $assistido = $sql['assistido'];
            if ($sql['tipo'] == 'video') {
                $sql = "SELECT * FROM videos WHERE id_aula = '$id_aula'";
                $sql = $this->db->query($sql);
                if ($sql->rowCount() > 0) {
                    $array = $sql->fetch();
                    $array['tipo'] = 'video';
                }
            }
            elseif($sql['tipo'] == 'poll'){
                    $sql = "SELECT * FROM questionarios WHERE id_aula = '$id_aula'";
                $sql = $this->db->query($sql);
                if ($sql->rowCount() > 0) {
                    $array = $sql->fetch();
                    $array['tipo'] = 'poll';
                }
            }
            $array['assistido'] = $assistido;
        }
        return $array;
    }
    public function setDuvida($duvida, $aluno_id){
        $sql = "INSERT INTO duvidas SET data_duvida = NOW(), respondida = '0', duvida = '$duvida', id_aluno = '$aluno_id'";
        $this->db->query($sql);
    }
    public function marcarAssistido($id){
        $aluno = $_SESSION["lgaluno"];
        $sql = "INSERT INTO historico SET data_viewed = NOW(), id_aluno = '$aluno', id_aula = '$id'";
        $this->db->query($sql);
    }
}
