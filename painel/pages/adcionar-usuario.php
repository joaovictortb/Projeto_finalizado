<?php

verificaPermissaoPagina(2);

?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adcionar Usuário</h2>


<form method="POST" enctype="multipart/form-data">



	<?php    
      if(isset($_POST['acao'])){
      $login = $_POST['login'];
      $nome = $_POST['nome'];
      $senha = $_POST['password'];
      $imagem = $_FILES['imagem'];
      $cargo = $_POST['cargo'];

       if($login ==''){
                Painel::alert('erro',' O login está vazio!');
       }else if ($nome== ''){
                Painel::alert('erro',' O nome está vazio!');
       }else if ($senha == ''){
                Painel::alert('erro',' A senha está vazia!');
       }else if($cargo == ''){ 
                Painel::alert('erro',' O cargo precisa estar selecionado!');
       }else if ($imagem['name'] == ''){
                Painel::alert('erro',' Selecione uma imagem!');
       }else{

          //Podemos cadastrar!

         if($cargo >= $_SESSION['cargo']){
                Painel::alert('erro','Você precisa selecionar um cargo menor que o seu!');

         }else if(Painel::imagemValida($imagem) == false){
                Painel::alert('erro','O formato da imagem não está correto!');

       

         }else{
          //Apenas cadastrar no banco de dados!
            $usuario = new Usuario();
            $imagem = Painel::uploadFile($imagem);
            $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
            Painel::alert('sucesso','O cadastro do usuário '.$login.' foi feito com secesso!');

         }


       }



       
        

      }

	?>

<div class="form-group">
	<label>Login:</label>
    <input type="text" name="login" >
</div><!--form-group-->

<div class="form-group">
  <label>Nome:</label>
    <input type="text" name="nome" >
</div><!--form-group-->
<div class="form-group">
	<label>Senha:</label>
    <input type="password" name="password" >
</div><!--form-group-->



 <div class="form-group">
<label>Cargo:</label>
<select name="cargo">
  <?php
foreach (Painel::$cargos as $key => $value) {
 if($key <$_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
}
  ?>
</select>
  </div><!--form-menu-->




<div class="form-group">
	<label>Imagem:</label>
	<input type="file" name="imagem">
	</div><!--form-group-->

	<div class="form-group">
	<input type="submit" name="acao" value="Adcionar!">
	</div><!--form-group-->
</form>


</div><!--box-content-->