<body class="home">
<h1 style="text-algin:center;">Seus Cursos</h1>
<?php foreach ($cursos as $curso):?>
    <a href="<?php echo BASE_URL."cursos/entrar/".$curso['id_curso']; ?>">
        <div class="cursoitem">
            <img src="<?php echo BASE_URL."assets/images/".$curso['imagem']; ?>" border="0" width="256" height="150" /><br/><br/>

                <strong><?php echo $curso['nome']; ?></strong><br/><br/>

                <?php echo $curso['descricao']; ?>
        </div>
    </a>
<?php endforeach; ?>
</body>