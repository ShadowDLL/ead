<div class="container">
    <h1>Aluno</h1>
    <a href="<?php echo BASE_URL; ?>aluno/add" class="btn btn-default">Adicionar</a><br/><br/>
    <table >
    	<tr>
    		<th width="500">Nome</th>
    		<th width="300">Qtd. Cursos</th>
    		<th width="500">Ações</th>
    	</tr>
    	<?php foreach($alunos as $aluno) :?>
    		<tr>
    			<td><?php echo $aluno['nome']; ?></td>
    			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $aluno['quantidade']; ?></td>
    			<td>
    				<a href="<?php echo BASE_URL; ?>aluno/edit/<?php echo $aluno['id']; ?>">[Editar]</a>
    				<a href="<?php echo BASE_URL; ?>aluno/del/<?php echo $aluno['id']; ?>">[Excluir]</a>
    			</td>
    		</tr>
    	<?php endforeach; ?>
    </table>
</div>
