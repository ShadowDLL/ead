<form method="POST">
	<h1 style="text-align: center;">Editar aula de questionario</h1>
	<div class="container" style="width:700;">
		<input type='text' name="pergunta" autofocus value='<?php echo $aula['questionario']['pergunta']; ?>' placeholder="Título da pergunta" class="form form-control" /><br/><br/>
		<input type="text" name="op1" value="<?php echo $aula['questionario']['opcao1']; ?>" placeholder="Opção 1" class="form form-control"><br/><br/>
		<input type="text" name="op2" value="<?php echo $aula['questionario']['opcao2']; ?>" placeholder="Opção 2" class="form form-control"><br/><br/>
		<input type="text" name="op3" value="<?php echo $aula['questionario']['opcao3']; ?>" placeholder="Opção 3" class="form form-control"><br/><br/>
		<input type="text" name="op4" value="<?php echo $aula['questionario']['opcao4']; ?>" placeholder="Opção 4" class="form form-control"><br/><br/>
		Resposta Correta:
		<select name="resposta">
			<option <?php echo ($aula['questionario']['resposta'] == 1)?"selected='selected'":''; ?> value='1'>1</option>
			<option <?php echo ($aula['questionario']['resposta'] == 2)?"selected='selected'":''; ?> value='2'>2</option>
			<option <?php echo ($aula['questionario']['resposta'] == 3)?"selected='selected'":''; ?> value='3'>3</option>
			<option <?php echo ($aula['questionario']['resposta'] == 4)?"selected='selected'":''; ?> value='4'>4</option>
		</select>
		<br/><br/>
		<input type="submit" value="Salvar" class="form form-control" />
	</div>
</form>