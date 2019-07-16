<!DOCTYPE html5>

<?php

include("includes/conexao.php");

?>

<html>
	<head>
		<title>Inserindo Produto</title>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
		<link rel="stylesheet" type="text/css" href="styles/theme.css" media="all">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	</head>
	
	<body>
	<div id="box" align="center">
	<form action="inserir_produto.php" method="post" enctype="multipart/form-data">
	
		<table id="formulario" align="center">
			<tr align="center">
				<td colspan="7"><h2>Inserir novo produto</h2></td>
			</tr>
			<tr>
				<td>Nome do produto: </td>
				<td><input type="text" name="nome_produto" required/></td>
			</tr>
			
			<tr>
				<td>Categoria do produto: </td>
				<td><select name="categ_produto" required>
					<option>Selecione a categoria</option>
					<?php
					
						$get_categ = "select * from categorias order by nome_categ";
	
						$run_categ = mysqli_query($con, $get_categ);
	
						while($row_categ = mysqli_fetch_array($run_categ)){
		
							$id_categ = $row_categ['id_categ'];
							$nome_categ = $row_categ['nome_categ'];
		
							echo "<option value='$id_categ'>$nome_categ</option>";
		
						}					
					?>
					
				</select></td>
			</tr>
			
			<tr>
				<td>Fornecedor do produto: </td>
				<td><select name="forn_produto" required>
					<option>Selecione o fornecedor</option>
					<?php
					
						$get_forn = "select * from fornecedores order by nome_forn";
	
						$run_forn = mysqli_query($con, $get_forn);
	
						while($row_forn = mysqli_fetch_array($run_forn)){
		
							$id_forn = $row_forn['id_forn'];
							$nome_forn = $row_forn['nome_forn'];
	
		
							echo "<option value='$id_forn'>$nome_forn</option>";
		
						}					
					?>
					
				</select></td>
			</tr>
			
			<tr>
				<td>Preço do produto: </td>
				<td><input type="text" name="preco_produto" required/></td>
			</tr>
			
			<tr>
				<td>Data do evento: </td>
				<td>
				<select name="dia_produto" required>
					<option>Dia</option>
					<?php
					$dia = 1;
					while($dia<=31){
						echo "<option value='$dia'>$dia</option>";
						$dia++;
					}
					
					?>
				</select>
				
				<select name="mes_produto" required>
					<option>Mês</option>
					
					<option value="01">Janeiro</option> 
					<option value="02">Fevereiro</option> 
					<option value="03">Março</option> 
					<option value="04">Abril</option> 
					<option value="05">Maio</option> 
					<option value="06">Junho</option> 
					<option value="07">Julho</option> 
					<option value="08">Agosto</option> 
					<option value="09">Setembro</option> 
					<option value="10">Outubro</option> 
					<option value="11">Novembro</option> 
					<option value="12">Dezembro</option> 
				</select>
				
				<select name="ano_produto" required>
					<option>Ano</option>
					<?php
					$ano = 2016;
					while($ano<=2018){
						echo "<option value='$ano'>$ano</option>";
						$ano++;
					}
					
					?>	
				</select>
				</select></td>
			</tr>
			
			<tr>
				<td>Descrição do produto: </td>
				
			</tr>
			
			<tr>
				<td colspan="7"><textarea name="desc_produto" cols="20" rows="10" ></textarea></td>
			</tr>
			
			<tr>
				<td>Imagem: </td>
				<td><input type="file" name="img_produto" required/></td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><button name="insert_post" type="submit" style="border:none">
							Enviar
				</button></td>
			</tr>
		
		
		</table>	
	
	</form>
	</div>
	
	</body>
</html>

<?php

	if(isset($_POST['insert_post'])){
		
		//obtendo os dados text dos campos
		$nome_produto = $_POST['nome_produto'];
		$categ_produto = $_POST['categ_produto'];
		$forn_produto = $_POST['forn_produto'];
		$preco_produto = $_POST['preco_produto'];
		$dia_produto = $_POST['dia_produto'];
		$mes_produto = $_POST['mes_produto'];
		$ano_produto = $_POST['ano_produto'];
		$desc_produto = $_POST['desc_produto'];
		
		//obtendo a imagem do campo
		$img_produto = $_FILES['img_produto']['name'];
		$img_produto_tmp = $_FILES ['img_produto']['tmp_name'];
		
		move_uploaded_file($img_produto_tmp,"produto_imgs/$img_produto");
		
		$inserir_produto = "insert into produtos (categ_produto,forn_produto,nome_produto,preco_produto,dia_produto,mes_produto,ano_produto,desc_produto,img_produto) values ('$categ_produto','$forn_produto','$nome_produto','$preco_produto','$dia_produto','$mes_produto','$ano_produto','$desc_produto','$img_produto')";
		
		//falta config data
		
		$insert_pro = mysqli_query($con, $inserir_produto);
		
		if($insert_pro){
			echo"<script>alert('Produto inserido com sucesso!')</script>";
			echo"<script>window.open('inserir_produto.php','_self')</script>";
		}
	}

?>