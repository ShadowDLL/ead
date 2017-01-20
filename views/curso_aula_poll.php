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
    <form method="POST">
        <h1>Aula Questionario</h1>
        <?php if ($_SESSION['poll'.$aula_info['id_aula']] > 2) {
                echo "Voce atingiu o numero maximo de tentativas";
            }
            else{
                echo "Tentativas ".$_SESSION['poll'.$aula_info['id_aula']].' de 2';
            ?>
                <h3><?php echo $aula_info['pergunta']; ?></h3>
                <?php for ($i = 1; $i <= 4; $i++) :?>
                    <input type="radio" name="opcao" value="<?php echo $i; ?>" id="opcao<?php echo $i; ?>" />
                    <label for="opcao<?php echo $i; ?>"><?php echo $aula_info['opcao'.$i]; ?></label><br/><br/>
                <?php endfor; ?>   
                <input type="submit" value="Enviar Resposta" /><br/><br/>
                <?php if (!empty($resposta)) {
                    echo $resposta;
                } ?>
                </form>
            <?php }?>
</div>
