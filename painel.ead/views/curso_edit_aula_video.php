<form method="POST">
	<h1 style="text-align: center;">Editar aula de video</h1>
	<div class="container" style="width:700;">
		<input type='text' name="titulo_video" autofocus value='<?php echo $aula['video']['nome']; ?>' placeholder="Título do Vídeo" class="form form-control" /><br/><br/>
		<textarea placeholder="Descrição do vídeo" name="descricao_video" class="form form-control"><?php echo $aula['video']['descricao']; ?></textarea><br/><br/>
		<input type="text" name="url" value="<?php echo $aula['video']['url']; ?>" placeholder="url do vídeo" class="form form-control"><br/><br/>
		<input type="submit" value="Salvar" class="form form-control" />
	</div>
</form>