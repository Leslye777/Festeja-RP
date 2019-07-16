<!DOCTYPE html5>
<?php include("superior.php"); ?>
				
	<div id="content_area">
	<?php
		if(isset($_GET['search'])){
	
		$search_query = $_GET['user_query'];
	
		$get_pro = "select * from produtos where nome_produto like '%$search_query%'";	
		
		getProdutos($get_pro); 
	?>
	</div>

<?php include("inferior.php"); ?>