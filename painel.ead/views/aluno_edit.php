<div class="container" style="width:700;">
    <h1>Editar Aluno</h1>
    <form method="POST">
        <input type="text" name="nome" class="form form-control" placeholder="Nome do Aluno" autofocus value="<?php echo $aluno['nome']; ?>" /><br/>
        <input type="email" name="email" placeholder="E-mail" class="form form-control" value="<?php echo $aluno['email']; ?>"><br/>
        <input type="password" name="senha" placeholder="Senha" class="form form-control" value="<?php echo $aluno['senha']; ?>"><br/>
        <div style="border-top:1px solid #BBB"></div>
        <h4>Pressione o CTRL para selecionar os cursos</h4>
        <select name="idcursos[]"  class="form form-control" multiple style="height:150px;">
        	<?php foreach($cursos as $curso): ?>
        		<option <?php echo(in_array($curso['id'], $inscrito))?"selected='selected'":""; ?>  value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
        	<?php endforeach; ?>
        </select><br/>
        <input type="submit" value="Salvar" class="form form-control" />
    </form>
</div>