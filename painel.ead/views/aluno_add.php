<div class="container" style="width:700;">
    <h1>Adicionar Aluno</h1>
    <form method="POST">
        <input type="text" name="nome" class="form form-control" placeholder="Nome do Aluno" autofocus /><br/>
        <input type="email" name ="email" class="form form-control" placeholder="E-mail"><br/>
        <input type="password" name="senha" class="form form-control" placeholder="Senha" value=""><br/>
        <div style="border-top:1px solid #BBB"></div>
        <h4>Pressione o CTRL para selecionar os cursos</h4>
        <select name="idcursos[]"  class="form form-control" multiple style="height:150px;">
        	<?php foreach($cursos as $curso): ?>
        		<option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
        	<?php endforeach; ?>
        </select><br/>
        <input type="submit" value="Adicionar" class="form form-control" />
    </form>
</div>