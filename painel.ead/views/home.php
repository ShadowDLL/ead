<div class="container">
    <h1>Cursos</h1>
    <a href="<?php echo BASE_URL; ?>curso/add" class="btn btn-default" >Adicionar Curso</a><br/><br/>
    <table class="table">
        <tr>
            <th width="150">Imagem</th>
            <th>Nome</th>
            <th width="200">Qtd. Alunos</th>
            <th width="300">Ações</th>
        </tr>
        <?php foreach ($cursos as $curso): ?>
        <tr>
            <td><img src="<?php echo BASE_URL_EAD; ?>assets/images/<?php echo $curso['imagem']; ?>" border="0" width="70" /></td>
            <td><?php echo utf8_encode($curso['nome']); ?></td>
            <td><?php echo $curso['qtd_alunos']; ?></td>
            <td>
                <a href="<?php echo BASE_URL ?>curso/edit/<?php echo $curso['id']; ?>" class="btn btn-default">Editar</a>
                <a href="<?php echo BASE_URL ?>curso/del/<?php echo $curso['id']; ?>" class="btn btn-default">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>