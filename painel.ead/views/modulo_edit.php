<div class="container" style="width:900;">
    <form method="POST">
        <h1>Editar Módulo</h1>
        <fieldset>
            <legend>Nome do Módulo</legend>
            <input type="text" name="modulo" placeholder="Módulo" value="<?php echo utf8_encode($modulo['nome']); ?>" autofocus class="form form-control" /><br/>
            <input type="submit" value="Salvar" class="form form-control" />
        </fieldset>       
    </form>
</div>

