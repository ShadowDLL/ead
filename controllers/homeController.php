<?php

class homeController extends controller
{
    public function __construct() {
        parent::__construct();
        $aluno = new alunos();
        if (!$aluno->isLogged()) {
            header("Location: ".BASE_URL."login");
        }
    }
    public function index()
    {
        $dados = array(
            'info' => '',
            'cursos' => ''
        );
        $aluno = new alunos();
        $aluno->setAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;       
        $curso = new cursos();
        $dados['cursos'] = $curso->getCursosDoAluno($aluno->getId());      
        $this->loadTemplate('home', $dados);
    }
}

