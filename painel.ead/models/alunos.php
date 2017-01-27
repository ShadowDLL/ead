<?php 
class alunos extends model{	
	public function __construct()
	{
		parent::__construct();
		$usuario = new usuarios();
		if (!$usuario->isLogged()) {
			header("Location: ".BASE_URL."login");
		}
	}
	public function getAlunos(){
		$array = array();
		$sql = "SELECT *, (SELECT count(id) FROM aluno_curso WHERE aluno_curso.id_aluno = alunos.id) AS quantidade FROM alunos";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getAluno($id){
		$array = array();
		$sql = "SELECT * FROM alunos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}
	public function add($nome, $email, $senha, $id_curso = array()){
		$this->db->query("INSERT INTO alunos SET nome = '$nome', email = '$email', senha = '$senha'");
		$id_aluno = $this->db->lastInsertId();
		foreach($id_curso as $curso){
			$this->db->query("INSERT INTO aluno_curso SET id_curso = '$curso', id_aluno = '$id_aluno'");
		}
	}
	public function edit($id, $nome, $email, $senha, $id_curso = array()){
		//Caso a senha esteja em branco e mesma não será alterada e caso a senha seja a mesma cadastrada não será alterada
		$sql = ($senha == "d41d8cd98f00b204e9800998ecf8427e")?"UPDATE alunos SET nome = '$nome', email = '$email' WHERE id = '$id'":"UPDATE alunos SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
		$this->db->query($sql);
		$this->db->query("DELETE FROM aluno_curso WHERE id_aluno = '$id'");
		foreach($id_curso as $curso){
			$this->db->query("INSERT INTO aluno_curso SET id_curso = '$curso', id_aluno = '$id'");
		}
	}
	public function del($id){
		$this->db->query("DELETE FROM aluno_curso WHERE id_aluno = '$id'");
		$this->db->query("DELETE FROM alunos WHERE id = '$id'");
	}
	public function existsSenha($senha){
		$sql = $this->db->query("SELECT id FROM alunos WHERE senha = '$senha'");
		return ($sql->rowCount() > 0)?true:false;
	}
}



?>