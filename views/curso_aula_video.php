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
    <h1>Video - <?php echo $aula_info['nome']; ?></h1>
    <iframe id="video" style="width:100%;" frameborder="0" src="//player.vimeo.com/video/<?php echo $aula_info['url']; ?>"></iframe>
    <?php echo $aula_info['descricao']; ?><br/>
    <br/>
    <?php if($aula_info['assistido'] > 0): ?>
        Essa aula ja foi assistida!
    <?php else :  ?>
        <button onclick="marcarAssistido(this)" data-id="<?php echo $aula_info['id']; ?>" >Marcar como assitido</button>
    <?php endif; ?>
    <hr/>
    <h3>Duvidas? Envie sua pergunta!</h3>
    <form method="POST" class="formduvida">
        <textarea name="duvida"></textarea><br/><br/>
        <input type="submit" value="Enviar" />
    </form>
</div>


