<div class="cursoinfo">
    <img src="<?php echo BASE_URL."assets/images/".$curso->getImagem(); ?>" border="0" height="60">
    <h3><?php echo $curso->getNome(); ?></h3>
    <h3><?php echo $curso->getDescricao(); ?></h3>
</div>
<div class="cursoleft">
    <?php foreach ($modulos as $modulo) :?>
        <div class="modulo"><?php echo($modulo['nome']); ?></div>
        <?php foreach ($modulo['aulas'] as $aula) :?>
        <a href="<?php echo BASE_URL."cursos/aula/".$aula['id']; ?>"><div class="aula"><?php echo $aula['nome']; ?></div></a>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>
<div class="cursoright">
    
</div>