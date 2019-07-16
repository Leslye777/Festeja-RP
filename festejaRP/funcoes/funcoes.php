<?php

//conexão com banco de dados
$con = mysqli_connect("localhost","root","","festejarp");
if (mysqli_connect_errno()){
	echo "The Connection was not established: " . mysqli_connect_error();
}

//Selecionando IP do cliente

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//Carrinho de compras
function add_carrinho(){
	if(isset($_GET['add_cart'])){
		global $con; 
		$ip = getIp();
		$id_produto = $_GET['add_cart'];
		$check_pro = "select * from carrinho where ip_address='$ip' AND id_prod='$id_produto'";
		$run_check = mysqli_query($con, $check_pro); 
		if(mysqli_num_rows($run_check)>0){
			$insert_pro = "update carrinho set quantidade=quantidade+1 where id_prod='$id_produto'";
			$run_pro = mysqli_query($con, $insert_pro); 
			echo "<script>window.open('ingressos.php','_self')</script>";
		}else {
			$insert_pro = "insert into carrinho (id_prod,ip_address,quantidade) values ('$id_produto','$ip',1)";
			$run_pro = mysqli_query($con, $insert_pro); 
			echo "<script>window.open('ingressos.php','_self')</script>";
		}
	}
}

//Selecionando categorias

function getCateg(){
	global $con;
	
	$get_categ = "select * from categorias order by nome_categ";
	
	$run_categ = mysqli_query($con, $get_categ);
	
	while($row_categ = mysqli_fetch_array($run_categ)){
		
		$id_categ = $row_categ['id_categ'];
		$nome_categ = $row_categ['nome_categ'];
		
		echo "<li><a href='ingressos.php?cat=$id_categ'>$nome_categ</a></li>";
		
	}
}

//Selecionando fornecedores/organizadores/repúblicas

function getForn(){
	global $con;
	
	$get_forn = "select * from fornecedores order by nome_forn";
	
	$run_forn = mysqli_query($con, $get_forn);
	
	while($row_forn = mysqli_fetch_array($run_forn)){
		
		$id_forn = $row_forn['id_forn'];
		$nome_forn = $row_forn['nome_forn'];
		
		echo "<li><a href='ingressos.php?forn=$id_forn'>$nome_forn</a></li>";
		
	}
}

//Selecionando produtos

function getProdutos(){
	global $con;
 
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
 	
	$get_produtos = "select * from produtos";
    $run_produtos = mysqli_query($con, $get_produtos);
   
    //conta o total de itens
    $total = mysqli_num_rows($run_produtos);
   
    //seta a quantidade de itens por página, neste caso, 2 itens
    $registros = 6;
   
    //calcula o número de páginas arredondando o resultado para cima
    $numPaginas = ceil($total/$registros);
   
    //variavel para calcular o início da visualização com base na página atual
    $inicio = ($registros*$pagina)-$registros;
	
    //seleciona os itens por página
    $get_produtos = "select * from produtos limit $inicio,$registros";
    $run_produtos = mysqli_query($con, $get_produtos);
    $total = mysqli_num_rows($run_produtos);
	
	
	
	
    //exibe os produtos selecionados
    while ($run_produto = mysqli_fetch_array($run_produtos)) {
		$id_produto = $run_produto['id_produto'];
		$nome_produto = $run_produto['nome_produto'];
		$preco_produto = $run_produto['preco_produto'];
		$img_produto = $run_produto['img_produto'];
		$desc_produto = $run_produto['desc_produto'];
		$dia_produto = $run_produto['dia_produto'];
		$mes_produto = $run_produto['mes_produto'];
		$ano_produto = $run_produto['ano_produto'];
	
		include("printar_prod.php");
    }
	
 
	echo"<div style='float:right;width:100%;height:auto;'>";
    //exibe a paginação
    if($pagina > 1) {
		echo "<a href='ingressos.php?pagina=".($pagina - 1)."' class='controle'>&laquo; anterior</a>";
	}
 
	for($i = 1; $i < $numPaginas + 1; $i++) {
		$ativo = ($i == $pagina) ? 'numativo' : '';
		echo "<a href='ingressos.php?pagina=".$i."' class='numero ".$ativo."'> ".$i." </a>";
	}
     
	if($pagina < $numPaginas) {
		echo "<a href='ingressos.php?pagina=".($pagina + 1)."' class='controle'>proximo &raquo;</a>";
	}
	echo"</div>";

}

//Fazer login
function fazer_login(){
	if(isset($_POST['login'])){
		$c_email = $_POST['email'];
		$c_senha = $_POST['senha'];
		
		$sel_c = "select * from clientes where senha_cliente='$c_senha' AND email_cliente='$c_email'";
		$run_c = mysqli_query($con, $sel_c);
		$check_cliente = mysqli_num_rows($run_c); 
		
		if($check_cliente==0){
			echo "<script>alert('Senha ou login incorretos.')</script>";
			exit();
		}
		
		$ip = getIp(); 
		$sel_carrinho = "select * from carrinho where ip_address='$ip'";
		$run_carrinho = mysqli_query($con, $sel_carrinho); 
		$check_carrinho = mysqli_num_rows($run_carrinho); 
		
		if($check_cliente>0 AND $check_carrinho==0){
			$_SESSION['email_cliente']=$c_email; 
			echo "<script>window.open('minha_conta.php','_self')</script>";
		}
		else {
			$_SESSION['email_cliente']=$c_email; 
			echo "<script>window.open('finalizar_compra.php','_self')</script>";
		}
	}
}

//Registrar

function registrar(){
if(isset($_POST['register'])){
		$ip = getIp();
		
		$c_nome = $_POST['c_nome'];
		$c_email = $_POST['c_email'];
		$c_senha = $_POST['c_senha'];
		$c_imagem = $_FILES['c_imagem']['nome'];
		$c_imagem_tmp = $_FILES['c_imagem']['tmp_nome'];
	
		move_uploaded_file($c_imagem_tmp,"cliente/cliente_img/$c_imagem");
		
		$insert_c = "insert into cliente (ip_cliente,nome_cliente,email_cliente,senha_cliente,img_cliente) values ('$ip','$c_nome','$c_email','$c_senha','$c_imagem')";
		$run_c = mysqli_query($con, $insert_c); 
		$sel_carrinho = "select * from carrinho where ip_address='$ip'";
		$run_carrinho = mysqli_query($con, $sel_carrinho); 
		$check_carrinho = mysqli_num_rows($run_carrinho); 
		
		if($check_carrinho==0){
			$_SESSION['email_cliente']=$c_email; 
			echo "<script>alert('Conta criada com sucesso!')</script>";
			echo "<script>window.open('minha_conta.php','_self')</script>";
		}
		else {
			$_SESSION['email_cliente']=$c_email; 
			echo "<script>alert('Conta criada com sucesso!')</script>";
			echo "<script>window.open('finalizar_compra.php','_self')</script>";
		}
	}
}

//Mudando a senha

function alterarSenha (){
	if(isset($_POST['mudar_senha'])){
		
		$usuario = $_SESSION['email_cliente']; 
		$senha_atual = $_POST['senha_atual']; 
		$nova_senha = $_POST['nova_senha']; 
		$nova_senha_confirm = $_POST['nova_senha_confirm']; 
		
		$sel_senha = "select * from clientes where senha_cliente='$senha_atual' AND email_cliente='$usuario'";
		
		$run_senha = mysqli_query($con, $sel_senha); 
		
		$conferir = mysqli_num_rows($run_senha); 
		
		if($conferir==0){
			echo "<script>alert('Senha atual não confere!')</script>";
			exit();
		}
		if($new_pass!=$new_again){
			echo "<script>alert('Nova senha não confirma!')</script>";
			exit();
		}
		else {
			$atualizar_senha = "update clientes set senha_cliente='$nova_senha' where email_cliente='$usuario'";
			$run_update = mysqli_query($con, $atualizar_senha); 
			echo "<script>alert('Senha atualizada com sucesso!')</script>";
			echo "<script>window.open('minha_conta.php','_self')</script>";
		}
	
	}
}

//Deletar conta

function deletarConta(){
	$usuario = $_SESSION['email_cliente']; 
	
	if(isset($_POST['sim'])){
		$deletar_cliente = "delete from clientes where email_cliente='$usuario'";
		$run_cliente = mysqli_query($con,$deletar_cliente); 
		echo "<script>alert('Conta deletada!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
	if(isset($_POST['nao'])){
		echo "<script>alert('Ufa! Ainda bem, é um prazer ter você como cliente!')</script>";
		echo "<script>window.open('minha_conta.php','_self')</script>";
	}
}


?>
