<html>
    <head>
      <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/angular.min.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
      <title>Titulo do Site</title>  
    </head>
    <body>
        <div class="topo">  
            <a href="<?php echo BASE_URL; ?>login/logout">
                <div>Sair</div>
            </a>
            <div class="topousuario"><?php echo $usuario['email']; ?></div>
        </div>
        <div>
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>    
    </body>
</html>