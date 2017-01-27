<?php 
class alunoController extends controller{
	public function __construct(){
		parent::__construct();
		$usuario = new usuarios();
		if (!$usuario->isLogged()) {
			header("Location: ".BASE_URL."login");
		}
	}
	public function index(){
		$dados = array(
			'usuario' => array(),
			'alunos' => array()
		);

		$usuario = new usuarios();
		$alunos = new alunos();

		$dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);
		$dados['alunos'] = $alunos->getAlunos();
		$this->loadTemplate("aluno", $dados);
	}
	public function add(){
		$dados = array(
			'usuario' => array(),
			'cursos' => array()
		);

		$usuario = new usuarios();
		$cursos = new cursos();
		$alunos = new alunos();

		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha = md5($_POST['senha']);
			$id_cursos = $_POST['idcursos'];
			$alunos->add($nome, $email, $senha, $id_cursos);
			header("Location: ".BASE_URL."aluno");
		}

		$dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);
		$dados['cursos'] = $cursos->getCursos();
		$this->loadTemplate("aluno_add", $dados);
	}
	public function edit($id){
		$dados = array(
			'usuario' => array(),
			'cursos' => array(),
			'aluno' => array(),
			'inscrito' => array()
		);

		$usuario = new usuarios();
		$cursos = new cursos();
		$aluno = new alunos();

		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha = ($aluno->existsSenha($_POST['senha']))?$_POST['senha']:md5($_POST['senha']);
			$id_cursos = $_POST['idcursos'];
			$aluno->edit($id, $nome, $email, $senha, $id_cursos);
			header("Location: ".BASE_URL."aluno");
		}

		$dados['cursos'] = $cursos->getCursos();
		$dados['inscrito'] = $cursos->getInscrito($id);
		$dados['aluno'] = $aluno->getAluno($id);
		$dados['usuario'] = $usuario->getUsuario($_SESSION['lgadmin']);
		$this->loadTemplate("aluno_edit", $dados);
	}
	public function del($id){
		if (isset($id) && !empty($id)) {
			$id = addslashes($id);
			$alunos = new alunos();
			$alunos->del($id);
			
		}
		header("Location: ".BASE_URL."aluno");	
	}

}




?>