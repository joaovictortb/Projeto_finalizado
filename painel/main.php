<?php
if(isset($_GET['loggout'])){
	Painel::loggout();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />

</head>
<body>

	<div class="menu">
		<div class="menu-wraper">
	<div class="box-usuario">
<?php
if($_SESSION ['img'] == ''){
?>

           <div class="avatar-usuario">
           	<i class="fa fa-user"></i>
           </div>
           <?php }else{ ?>
            <div class="imagem-usuario">
           	<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" /> 
           </div>
           <?php } ?>
           <div class ="nome-usuario">
           	<p><?php echo $_SESSION['nome']; ?></p>
           	<p><?php echo pegaCargo($_SESSION['cargo']);?></p>

           </div>
       </div>
     

       <div class="items-menu">
       	<h2>Cadastro</h2>
       	<a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
        <a  href="">Cadastrar Imóveis</a>
       	<a  href="">Cadastrar Aluguel</a>
       	<a  href="">Cadastrar Slides</a>
       	<h2>Gestão</h2>
       	<a  href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
       	<a  href="">Listar Aluguel</a>
       	<a href="">Listar Imóveis</a>
       	<a href="">Listar Slides</a>
       	<h2>Administração do Painel</h2>
              <a <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adcionar-usuario">Adcionar Usuário</a>
       	<a  href="<?php echo INCLUDE_PATH_PAINEL ?>editar_usuario">Editar Usuário</a>

  
                <a <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>excluir_usuario">Excluir Usuário</a>

       	<h2>Configuração Geral</h2>
       	<a href="">Editar Site</a>
       
       </div><!--items-menu-->
       </div><!--menu-wraper-->
       </div><!--menu-->
	
		
	  <header>
		<div class="center">

		<div class="loggout">

			<a href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-home"></i> <span> Página Inicial</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa fa-sign-out"></i> <span>Sair</span></a>
		</div>

        <div class="clear"></div>
        </div>
  
        </header>

        


<div class="contentt">

<?php Painel::carregarPagina(); ?>
	


</div><!--contentt-->
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>

</body>
</html>


