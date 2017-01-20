<?php
class ajaxController extends model{
    public function __construct() {
        parent::__construct();
        $alunos = new alunos();
        if (!$alunos->isLogged()) {
            header("Location: ".BASE_URL."Login");
        }
    }
    public function marcarAssistido($id){
        $aulas = new aulas();
        $aulas->marcarAssistido($id);
    }

}
