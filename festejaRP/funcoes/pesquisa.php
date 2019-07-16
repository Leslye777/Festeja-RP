<?php
function getProdPesq(){
	global $con;
 
	$search_query = $_GET['user_query'];
	$get_pro = "select * from products where product_keywords like '%$search_query%'";
	$run_produtos = mysqli_query($con, $get_pro); 
   
    //conta o total de itens
    $total = mysqli_num_rows($run_produtos);
   
	if($total==0){
		echo "<h3>Nenhum produto encontrado.</h3>";
	}
		
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
	
}
?>