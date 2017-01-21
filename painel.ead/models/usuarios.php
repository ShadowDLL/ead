<?php
class usuarios extends model{
    public function __construct(){
        parent::__construct();
    }
    public function isLogged(){
        return (isset($_SESSION['lgadmin']) && !empty($_SESSION['lgadmin']))?true:false;
    }
    public function login($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $_SESSION['lgadmin'] = $sql['id'];
            return true;
        }
        return false;
    }
    public function getUsuario($id){
        $array = array();
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
}

