<div class="container">
    <h1>Cursos</h1>
    <button class="btn btn-default">Adicionar Curso</button>
    <table class="table">
        <th width="150">Imagem</th>
        <th>Nome</th>
        <th width="200">Qtd. Alunos</th>
        <th width="300">Ações</th>
        <?php foreach ($cursos as $curso): ?>
        <tr>
            <td><img src="<?php echo BASE_URL ?>assets/images/<?php echo $curso['imagem']; ?>" border="0" width="70" /></td>
            <td><?php echo $curso['nome']; ?></td>
            <td><?php echo $curso['qtd_alunos']; ?></td>
            <td>
                <a href="<?php echo BASE_URL ?>curso/editar/<?php echo $curso['id']; ?>" class="btn btn-default">Editar</a>
                <a href="<?php echo BASE_URL ?>curso/excluir/<?php echo $curso['id']; ?>" class="btn btn-default">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>