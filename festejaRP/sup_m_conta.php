<!DOCTYPE html5>
<?php
include("funcoes/funcoes.php");
include("admin_area/includes/conexao.php");

?>

<html>
	<head>
		<title>Festeja RP</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
		<link rel="icon" href="imagens/favicon.png"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		
		<script>
			function Mudarestado(el) {
	
				var display = document.getElementById(el).style.display;
				if(display == "none")
					document.getElementById(el).style.display = 'block';
				else
					document.getElementById(el).style.display = 'none';
			}
			
			function myFunction(el) {
				document.getElementById(el).classList.toggle("show");
			}
			// Close the dropdown menu if the user clicks outside of it
			window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {
		
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
						}
					}
				}
			}
		
		</script>
		
		
	</head>

	<body>
	
		<div class="main_wrapper">
			
			<div class="header_wrapper">
				<img src="imagens/logo.png"/>
				<div id="icones">
				<table>
					<tr>
						<td style="background-color: #ce9cb4;"><a href="minha_conta.php"><img  src="imagens/ic_person_outline_black_24dp_2x.png" class="botao" border="none" id="btClientes" onmouseover="this.src='imagens/ic_person_black_24dp_2x.png'" onmouseout="this.src='imagens/ic_person_outline_black_24dp_2x.png'" style="height: 36px; width:auto;"/></a></td>
					</tr>
					<tr>
						<td style="background-color: #a9527c;padding-top:10px;"><a href="carrinho_compras.php"><i class="material-icons black30 md-36">&#xE8CC;</i></a></td>
					</tr>
					<tr>
						<td style="background-color: #850844;"><a href="https://www.facebook.com/" target="_blank"><img  src="imagens/face.png" class="botao" border="none" style="height: 36px; width:auto;"/></a></td>
					</tr>
				</table></div>		
				
			</div>
			<div class="menubar">
				<nav id="menu">
					<a href="index.php">Página Inicial</a>
					<a href="quem_somos.php">Quem Somos</a>
					<a href="ingressos.php">Ingressos</a>
					<a href="anuncie.php">Anuncie</a>
					
				</nav>
				
				<div id="form">
					<form method="get" action="ingresso.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Buscar ingresso"/>
						<button type="submit" name="search" style="background:transparent;border:none">
							<i class="material-icons">&#xE8B6;</i>
						</button>
					</form>
				</div>
			</div>
			
			<div class="content_wrapper">