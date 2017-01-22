<div class="container" style="width:900;">
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
    <table class="table">
        <?php foreach($modulos as $modulo) :?>
        <tr>
            <td><?php echo utf8_encode($modulo['nome']); ?></td>
            <td width="250">
                <a href="<?php echo BASE_URL; ?>modulo/edit/<?php echo $modulo['id']; ?>" style="color:#3A75C5;text-decoration:none;">&nbsp;<strong>[Editar]</strong></a>
                <a href="<?php echo BASE_URL; ?>modulo/del/<?php echo $modulo['id']; ?>" style="color:#C93C35;text-decoration:none;">&nbsp;<strong>[Excluir]</strong></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    
    
</div>