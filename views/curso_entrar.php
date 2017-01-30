<div class="cursoinfo">
    <img src="<?php echo BASE_URL."assets/images/".$curso->getImagem(); ?>" border="0" height="60">
    <h3><?php echo $curso->getNome(); ?></h3>
    <h3><?php echo $curso->getDescricao(); ?></h3>
</div>
<div class="cursoleft">
	<div class="progresso"><strong>Seu Progresso:</strong><br/> <?php echo $assistidas; ?> aulas de <?php echo $totalcurso; ?> (<?php echo floor(($assistidas/$totalcurso)*100); ?>% completo)</div>
	<?php 
		$idDiv = '';
		foreach ($modulos as $modulo){
			$idDiv = $modulo['id'];
		}
	?>
    <?php foreach ($modulos as $modulo) :?>
        <div class="modulo" onclick="hideAulas('<?php echo $idDiv; ?>');showAulas('<?php echo $modulo['id']; ?>');" ><?php echo utf8_encode($modulo['nome'])?></div>
        <div id="<?php echo $modulo['id']; ?>" class="modulo_aula">
	        <?php foreach ($modulo['aulas'] as $aula) :?>
	        		<a href="<?php echo BASE_URL."cursos/aula/".$aula['id']; ?>"><div class="aula"><?php echo $aula['nome']; ?><img src="<?php echo BASE_URL; ?>assets/images/<?php echo ($aula['assistido'])?'v.jpg':'v2.jpg'; ?>" height="20" style="float: right;margin-top: 5px; padding-right: 10px;"></div></a>
	        <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<div class="cursoright">
    
</div>
