<?php
class aulaController extends controller{
    public function __construct() {
        parent::__construct();
        $usuario = new usuarios();
        if (!$usuario->isLogged()) {
          header("Location: ".BASE_URL."login");
        }
    }
    public function edit($id){
        $dados = array(
            'usuario' => array(),
            'aula' => array()
        );

        $aula = new aulas();
        $usuario = new usuarios();

        if (isset($_POST['titulo_video']) && !empty($_POST['titulo_video'])) {
            $tituloVideo = addslashes($_POST['titulo_video']);
            $descricao = addslashes($_POST['descricao_video']);
            $url = addslashes($_POST['url']);
            $id_curso = $aula->setVideoAula($id, $tituloVideo, $descricao, $url);
            header("Location: ".BASE_URL."curso/edit/".$id_curso);
        }

        if (isset($_POST['pergunta']) && !empty($_POST['pergunta'])) {
            $pergunta = addslashes($_POST['pergunta']);
            $op1 = addslashes($_POST['op1']);
            $op2 = addslashes($_POST['op2']);
            $op3 = addslashes($_POST['op3']);
            $op4 = addslashes($_POST['op4']);
            $resposta = addslashes($_POST['resposta']);
            $id_curso = $aula->setQuestionarioAula($id, $pergunta, $op1, $op2, $op3, $op4, $resposta);
            header("Location: ".BASE_URL."curso/edit/".$id_curso);
        }

        
        $dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);   
        $dados['aula'] = $aula->getAula($id);
        $view = "curso_edit_aula_".$dados['aula']['tipo'];
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

