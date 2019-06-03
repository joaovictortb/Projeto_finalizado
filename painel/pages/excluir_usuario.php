<?php

if(isset($_GET['excluir'])){
	$idExcluir = intval($_GET['excluir']);
	Painel::deletar('tb_admin.usuarios',$idExcluir);
}
$depoimentos = Painel::selectAll('tb_admin.usuarios');


?>


<div class="box-content">
	<h2><i class="fa fa-trash" aria-hidden="true"></i> Excluir Usuários</h2>

	<table>
		<tr>
			
			<td>Nome</td>
			<td>User</td>
		    <td>&nbsp;</td>
			<td>&nbsp;</td>

		</tr>

<?php
         foreach ($depoimentos as $key => $value) {

		?>
		<tr>
			
			<td><?php echo $value['nome']; ?></td>
			<td><?php echo $value['user']; ?></td>
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar_usuario?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil" ></i> Editar </a></td>
			<td><a class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>excluir_usuario?excluir=<?php echo $value ['id']; ?>"><i class="fa fa-times" ></i> Excluir </a></td>
        </tr>
        

         <?php }   ?>


	</table>
</div><!--box-content-->
