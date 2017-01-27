<?php
class cursosController extends controller{
    public function __construct() {
        parent::__construct();
        $aluno = new alunos();
        if (!$aluno->isLogged()) {
            header("Location: ".BASE_URL."login");
        }     
    }
    public function index()
    {
        header("Location: ".BASE_URL);
    }
    public function entrar($id){
        $dados = array(
            'curso' => array(),
            'modulos' => array(),
            'info' => array(),
            'assistidas' => '',
            'totalcurso' => ''
        );
        $aluno = new alunos();
        $curso = new cursos();
        
        $aluno->setAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;
        if ($aluno->isInscrito($id)) {      
            $curso->setCurso($id);
            $dados['curso'] = $curso;
            $modulos = new modulos();
            $dados['modulos'] = $modulos->getModulo($id);
            $dados['assistidas'] = $aluno->getAulasAssistidas($id);
            $dados['totalcurso'] = $curso->getTotalAulasCurso();
            $this->loadTemplate("curso_entrar", $dados);
        }
        else{
           header("Location: ".BASE_URL); 
        }   
    }
    public function aula($id_aula){
            $dados = array(
            'curso' => array(),
            'modulos' => array(),
            'info' => array(),
            'aula' => array(),
            'resposta' => ''
        );
        $aluno = new alunos();
        $aluno->setAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;
        $aula = new aulas();
        $id = $aula->getCursoDeAula($id_aula);
        if ($aluno->isInscrito($id)) {
            $curso = new cursos();
            $curso->setCurso($id);
            $dados['curso'] = $curso;
            $modulos = new modulos();
            $dados['modulos'] = $modulos->getModulo($id);
            $dados['aula_info'] = $aula->getAula($id_aula);
            if ($dados['aula_info']['tipo'] == 'video') {
                $view = 'curso_aula_video';
            }
            else{
                $view = 'curso_aula_poll';
                if (!isset($_SESSION['poll'.$id_aula])) {
                    $_SESSION['poll'.$id_aula] = 1;
                }
            }
            if (isset($_POST['duvida']) && !empty($_POST['duvida'])) {
                $duvida = addslashes($_POST['duvida']);
                $aula->setDuvida($duvida, $aluno->getId());
                unset($_POST['duvida']);
            }
            if (isset($_POST['opcao']) && !empty($_POST['opcao'])) {
                $opcao = addslashes($_POST['opcao']);
                if ($opcao == $dados['aula_info']['resposta']){
                    $dados['resposta'] = 'RESPOSTA CORRETA!';
                }
                else{
                    $dados['resposta'] = 'RESPOSTA INCORRETA!';
                }
                $_SESSION['poll'.$id_aula]++;
            }
            $this->loadTemplate($view, $dados);
        }
        else{
           header("Location: ".BASE_URL); 
        }   
    }
}

