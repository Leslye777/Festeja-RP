<!DOCTYPE html5>

<?php 
if(!isset($_SESSION['email_cliente'])){
	include("superior.php");
?>
	<div id="content_area">
<?php include("cliente/login.php"); ?>
	</div>
<?php include("inferior.php");
	
}
if(isset($_SESSION['email_cliente'])){
	
	include("sup_m_conta.php"); 
?>
	
	<div id="sidebar">
			
		<ul id="cats">

<?php 
		$usuario = $_SESSION['email_cliente'];
		$get_img = "select * from clientes where email_cliente='$usuario'";
		$run_img = mysqli_query($con, $get_img); 
		$row_img = mysqli_fetch_array($run_img); 
		$c_imagem = $row_img['img_cliente'];
		$c_nome = $row_img['nome_cliente'];
		echo "<p style='text-align:center;'><img src='cliente_img/$c_imagem' width='150' height='150' style='border-radius: 50px;'/></p>";
?>
			
			<li><a href="minha_conta.php?meus_pedidos">Meus pedidos</a></li>
			<li><a href="minha_conta.php?editar_conta">Atualizar informações de conta</a></li>
			<li><a href="minha_conta.php?mudar_senha">Alterar senha</a></li>
			<li><a href="minha_conta.php?deletar_conta">Deletar conta</a></li>
			<li><a href="cliente/logout.php">Logout</a></li>
		</ul>
				
	</div>		
	
	<div id="content_area">
<?php 
			if(!isset($_GET['meus_pedidos'])){
				if(!isset($_GET['editar_conta'])){
					if(!isset($_GET['mudar_senha'])){
						if(!isset($_GET['deletar_conta'])){
							
							echo "
							<h2 style='padding:20px;'>Bem-vindo,  $c_nome </h2>
							<b>Você pode acompanhar seus pedidos clicando <a href='minha_conta.php?meus_pedidos'>aqui</a></b>";
						}
					}
				}
			}
?>
				
<?php 
			if(isset($_GET['meus_pedidos'])){
				include("cliente/meus_pedidos.php");
			}
			if(isset($_GET['editar_conta'])){
				include("cliente/editar_conta.php");
			}
			if(isset($_GET['mudar_senha'])){
				include("cliente/mudar_senha.php");
			}
			if(isset($_GET['deletar_conta'])){
				include("cliente/deletar_conta.php");
			}
?>
	</div>
<?php include("inferior.php");
}
?>