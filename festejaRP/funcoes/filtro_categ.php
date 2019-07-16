<?php
function getProdCat(){
	global $con;
 
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
 	
	$id_categ = $_GET['cat'];
	$get_produtos = "select * from produtos where categ_produto='$id_categ'";
    $run_produtos = mysqli_query($con, $get_produtos);
   
    //conta o total de itens
    $total = mysqli_num_rows($run_produtos);

	if($total==0){
		echo "<h3>Não há produtos nessa categoria.</h3>";
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