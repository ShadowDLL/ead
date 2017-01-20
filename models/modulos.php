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
}

