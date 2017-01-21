<?php

class homeController extends controller
{
    public function __construct() {
        parent::__construct();
        $usuarios = new usuarios();
        if (!$usuarios->isLogged()) {
            header("Location: ".BASE_URL."login");
        }
    }
    public function index()
    {
        $dados = array(
            'usuario' => '',
            'cursos' => array()
        );
        $usuario = new usuarios();
        $dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);
        unset($usuario);
        $cursos = new cursos();
        $dados['cursos'] = $cursos->getCursos();
        $this->loadTemplate('home', $dados);
    }
}

