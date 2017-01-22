<?php
class modulos extends model{
    public function __construct() {
        parent::__construct();
    }
    public function getModulo($id){
        $array = array();
        $sql = "SELECT * FROM modulos WHERE id_curso = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            $aulas = new aulas();
            foreach ($array as $key => $value) {
                $array[$key]['aulas'] = $aulas->getAulasDoModulo($value['id']);
            }
        }
        return $array;
    }
    public function add($id, $nome){
        $sql = "INSERT INTO modulos SET nome = '$nome', id_curso = '$id'";
        $this->db->query($sql);
    }
    public function edit($id, $nome){
        $sql = $this->db->query("SELECT id_curso FROM modulos WHERE id = '$id'");
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $this->db->query("UPDATE modulos SET nome = '$nome' WHERE id = '$id'");
            header("Location: ".BASE_URL."curso/edit/".$sql['id_curso']);
        }
        else{
            header("Location: ".BASE_URL);
        }    
    }
    public function del($id){
        $sql = $this->db->query("SELECT id_curso FROM modulos WHERE id = '$id'");
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $this->db->query("DELETE FROM modulos WHERE id = '$id'");
            header("Location: ".BASE_URL."curso/edit/".$sql['id_curso']);
        }
        else{
            header("Location: ".BASE_URL);
        }    
    }
    public function getModel($id){
        $array = array();
        $sql = "SELECT * FROM modulos WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
}

