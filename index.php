<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Projeto 01</title>
<link rel="stylesheet"<?php echo INCLUDE_PATH; ?> href="estilo/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="palavras-chave,do,meu,site">
<meta name="description" content="Descrição do meu site"> 
<meta charset="utf-8"/>
</head>
<body>

<?php
 $url =isset($_GET['url']) ? $_GET['url'] : 'home';
 switch ($url) {
     case 'venda':
echo'<target target="venda" />';
         break;
     
     case 'aluguel':
echo'<target target="aluguel" />';
         break;
 }

?>
<?php new Email(); ?>

<header>
		   <div class="center">
		   <div class="logo left"><i class="fa fa-home" aria-hidden="true"></i> Imóveis Pereira</div><!--logo-->
		   <nav class="desktop right">
			<ul>
				<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>venda">Venda</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>aluguel">Aluguel</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>corretores">corretores</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
			</ul>
			<nav class="mobile right">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">Sobre</a></li>
				<li><a href="">Serviços</a></li>
				<li><a href="">Corretores</a></li>
                <li><a href="">Contato</a></li>
			</ul>
		</nav>
        </div><!--center-->
        <div class="clear"></div>
        </header>


            <?php
       
        if (file_exists('pages/'.$url.'.php')){
        	include('pages/'.$url.'.php');
        }else{
            if ($url != 'venda' && $url !='aluguel') {
                $pagina404= true;
        	    include('pages/error.php');
            }else{
                include('pages/home.php');
            }
            }
            ?>

                <footer>
            	<div class="center">
            	<p>©Todos os direitos reservados</p>
                </div><!--center-->
                </footer>
                <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
                <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
                <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
                <?php
                  if ($url=='contato'){
                ?>
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
                <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
            <?php } ?>
                </body>
                </html>

