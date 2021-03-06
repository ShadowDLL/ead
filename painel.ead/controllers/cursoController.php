<?php
class cursoController extends controller{
    public function __construct() {
        parent::__construct();
        $usuario = new usuarios();
        if (!$usuario->isLogged()) {
          header("Location: ".BASE_URL."login");
        }
    }
    public function del($id){
        if (isset($id) && !empty($id)) {
           $id_curso = addslashes($id);
           $cursos = new cursos();
            $cursos->del($id_curso);
        }
        header("Location: ".BASE_URL);
    }
    public function edit($id){
        $dados = array(
            'usuario' => array(),
            'curso'=> array(),
            'modulos' => array(),
            'aulas' => array()
        );
        $usuario = new usuarios();
        $curso = new cursos();
        $modulos = new modulos();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
           $id_curso = addslashes($id);
           $nome = addslashes($_POST['nome']);    
           $descricao = addslashes($_POST['descricao']);
           $imagem = $_FILES['imagem'];
           $cursos = new cursos();
           $cursos->edit($id_curso, $nome, $descricao);
           if (!empty($imagem['tmp_name'])) {
               $imageName = md5(time().rand(0,9999)).'.jpg';
               $types = array('image/jpg', 'image/jpeg', 'image/png');
               if (in_array($imagem['type'], $types)) {
                   move_uploaded_file($imagem['tmp_name'], "../assets/images/".$imageName);
               }
               $curso->updateImage($id, $imageName);
           }
           header("Location: ".BASE_URL);
        }
        if (isset($_POST['modulo']) && !empty($_POST['modulo'])) {
            $modulo = addslashes($_POST['modulo']);
            $modulos->add($id, $modulo);
        }
        if (isset($_POST['aula']) && !empty($_POST['aula'])) {
            $modulo = addslashes($_POST['moduloaula']);
            $aula = addslashes($_POST['aula']);
            $tipo = addslashes($_POST['tipo']);
            $aulas = new aulas();
            $dados['aulas'] = $aulas->addAula($aula, $modulo, $tipo);
        }
        $dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);
        unset($usuario);
        $dados['curso'] = $curso->getCurso($id);
        unset($curso);
        $dados['modulos'] = $modulos->getModulo($id);
        unset($modulos);
        $this->loadTemplate("curso_edit", $dados);
    }
    public function add(){
        $dados = array(
            'usuario' => ''
        );
        $usuario = new usuarios();
        $dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);
        unset($usuario);
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
           $nome = addslashes($_POST['nome']);
           $imagem = $_FILES['imagem'];
           $descricao = addslashes($_POST['descricao']);
           if (!empty($imagem['tmp_name'])) {
               $imageName = md5(time().rand(0,9999)).'.jpg';
               $types = array('image/png', 'image/jpg','image/jpeg');
               if (in_array($imagem['type'], $types)) {
                   move_uploaded_file($imagem['tmp_name'], "../assets/images/".$imageName);
               }   
           } 
           $cursos = new cursos();
           $cursos->add($nome, $imageName, $descricao);
           header("Location: ".BASE_URL);
        }
        $this->loadTemplate("curso_add", $dados);
    }
}

