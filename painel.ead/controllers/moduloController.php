<?php
class moduloController extends controller{
    public function __construct() {
        parent::__construct();
    }
    public function edit($id){
        $dados = array(
            'modulo' => array(),
            'usuario' => array()
        );
        $usuario = new usuarios();
        $modulo = new modulos();
        if (isset($id) && !empty($id) && isset($_POST['modulo']) && !empty($_POST['modulo'])) {
            $idmodulo = addslashes($id);
            $nome = addslashes($_POST['modulo']);  
            $modulo->edit($id, $nome);
        }
        $dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);
        $dados['modulo'] = $modulo->getModel($id);
        $this->loadTemplate("modulo_edit", $dados);
    }
    public function del($id){
        if (isset($id) && !empty($id)) {
            $idmodulo = addslashes($id);
            $modulo = new modulos();
            $modulo->del($idmodulo);
        }
    }
}

