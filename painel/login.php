<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
    <link href="<?php echo INCLUDE_PATH_PAINEL  ?>css/style.css" rel="stylesheet" />
</head>
<body>


<div class="box-login">
	<?php
    if(isset($_POST['acao'])){
    	$user= $_POST['user'];
    	$password= $_POST['password'];
    	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password= ?");
    	$sql->execute(array($user,$password));
    	if($sql->rowCount()== 1){
            $info = $sql->fetch();

       //logamos com sucesso.
    		$_SESSION['login'] = true;
    		$_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];
            header('Location: '.INCLUDE_PATH_PAINEL);
            die();

    	}else{
    		//falhou
    	echo '<div class="erro-box"><i class="fa fa-times" aria-hidden="true"></i> Usuário ou senha incorretos!</div>';
    	}
    }

	?>

<h2>login:</h2>
<form method="post">

<input type="text" name="user" placeholder="Login..." required>
<input type="password" name="password" placeholder="Senha..." required>
<input type="submit" name="acao" value="Logar!">

</form>

</div><!--box-login-->


</body>
</html>