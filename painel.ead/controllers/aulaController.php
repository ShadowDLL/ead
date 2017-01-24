<?php
class aulaController extends controller{
    public function __construct() {
        parent::__construct();
    }
    public function edit($id){
        $dados = array(
            'aula' => array()
        );
        $aula = new aulas();
        $dados['aula'] = $aula->getAula($id);
        $view = ($dados['aula']['tipo'] == "video")?"curso_edit_aula_video":"curso_edit_aula_questionario";
        $this->loadTemplate($view, $dados);
    }
    public function del($id){
        if (!empty($id)) {
           $id = addslashes($id);
           $aulas = new aulas();
           $id_curso = $aulas->delAula($id);
           header("Location: ".BASE_URL."curso/edit/".$id_curso);
        }
        else{
            header("Location: ".BASE_URL);
        }  
    }
}

