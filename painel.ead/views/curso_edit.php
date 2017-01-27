<div class="container" style="width:700;">
    <h1>Editar Curso</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nome" class="form form-control" placeholder="Nome do Curso" value="<?php echo utf8_encode($curso['nome']); ?>" autofocus /><br/>
        Descrição:<br/>
        <textarea name="descricao" class="form form-control"><?php echo utf8_encode($curso['descricao']); ?></textarea><br/>
        Imagem:<br/>
        <input type="file" name="imagem" class="form form-control" /><br/>
        <img src="<?php echo BASE_URL_EAD; ?>assets/images/<?php echo $curso['imagem']; ?>" border="0" height="80" /><br/><br/>
        <input type="submit" value="Salvar" class="form form-control" /><br/>
    </form>
    <fieldset >
        <legend>Adicionar Módulo:</legend>
        <form method="POST">
            <input type="text" name="modulo" />
            <input type="submit" value="Adicionar" />
        </form>
    </fieldset>
    <fieldset >
        <legend>Adicionar Aula:</legend>
        <form method="POST">
            <input type="text" name="aula" placeholder="Titulo da Aula" /><br><br/>
            Modulo da Aula:<br/>
            <select name="moduloaula">
                <?php foreach($modulos as $modulo): ?>
                <option value="<?php echo $modulo['id']; ?>"><?php echo utf8_encode($modulo['nome']); ?></option>
                <?php endforeach; ?>
            </select><br/><br/>
            Tipo da Aula:<br/>
            <select name="tipo">
                <option value="video">Video</option>
                <option value="poll">Questionario</option>
            </select>
            <input type="submit" value="Adicionar" />
        </form>
    </fieldset>
        <?php foreach($modulos as $modulo) :?>
                <div class="modulo_painel">
                    <?php echo utf8_encode($modulo['nome']); ?></td>
                    <a href="<?php echo BASE_URL; ?>modulo/del/<?php echo $modulo['id']; ?>" style="color:#C93C35;text-decoration:none;">&nbsp;<strong>[Excluir]</strong></a>
                    <a href="<?php echo BASE_URL; ?>modulo/edit/<?php echo $modulo['id']; ?>" style="color:#3A75C5;text-decoration:none;">&nbsp;<strong>[Editar]</strong></a>
                </div>
                <?php foreach($modulo['aulas'] as $aula) :?>
                    <div class="modulo_aula">
                        <?php echo $aula['nome']; ?></td>
                        <a href="<?php echo BASE_URL; ?>aula/del/<?php echo $aula['id']; ?>" style="color:#C93C35;text-decoration:none;">&nbsp;<strong>[Excluir]</strong></a>
                        <a href="<?php echo BASE_URL; ?>aula/edit/<?php echo $aula['id']; ?>" style="color:#3A75C5;text-decoration:none;">&nbsp;<strong>[Editar]</strong></a>
                    </div>
                <?php endforeach; ?>
        <?php endforeach; ?>
    
    <div style="margin-bottom: 100px;">
    
    
</div>