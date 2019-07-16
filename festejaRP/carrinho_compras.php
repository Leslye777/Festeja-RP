<!DOCTYPE html5>
<?php include("superior.php"); ?>
	
	<div id="content_area">
	</br>
	</br>
	<form action="" method="post" enctype="multipart/form-data">
			
		<table align="center" width="920">
			<tr align="center">
				<th>Remover</th>
				<th>Produto</th>
				<th>Quantidade</th>
				<th>Preço</th>
			</tr>
					
		<?php 
		
		$total = 0;
		global $con; 
		$ip = getIp(); 
		
		$carrinho = "select * from carrinho where ip_address='$ip'";
		
		$run_carrinho = mysqli_query($con,$carrinho); 
		
		if (!$run_carrinho) {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		}

		while($p=mysqli_fetch_array($run_carrinho)){
			$quantidade = $p['quantidade']; 
			$id_produto = $p['id_prod']; 
			$preco_prod = "select * from produtos where id_produto='$id_produto'";
			$run_preco = mysqli_query($con,$preco_prod); 
			
			if (!$run_preco) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}
			
			while ($pp_price = mysqli_fetch_array($run_preco)){
				$preco_total = array($pp_price['preco_produto']);
				$nome_produto = $pp_price['nome_produto'];
				$img_produto = $pp_price['img_produto']; 
				$preco_produto = $pp_price['preco_produto'];
				$values = array_sum($preco_total); 
				$total += $values; 
				$total = $total*$quantidade;	
		?>
					
		<tr align="center">
			<td style="vertical-align:middle"><input type="checkbox" name="remove[]" value="<?php echo $id_produto;?>"/></td>
			<td style="vertical-align:middle;"><?php echo $nome_produto; ?><br><img src="admin_area/produto_imgs/<?php echo $img_produto;?>" width="60" height="60"/></td>
			<td style="vertical-align:middle"><input type="text" size="3" name="qtd[$id]" value="<?php echo $quantidade;?>"/></td>

		<?php 
			if(isset($_POST['updatecart'])){
				
				foreach($_POST['qtd'] as $quantidade){
					$update_qtd = "update carrinho set quantidade='$quantidade'";
					$run_qtd = mysqli_query($con, $update_qtd);
				
					if($run_qtd){
						echo "<script>window.open('carrinho_compras.php','_self')</script>";
					}
				}
			}
			
		?>
			<td style="vertical-align:middle"><?php echo "R$ " . $preco_produto.",00"; ?></td>
		</tr>
		<?php } } ?>
				
		<tr>
			<td colspan="3"></td>
			<td align="center"><b>Total: </b><?php echo "R$" . $total.",00";?></td>
		</tr>				
		<tr align="center" height="50px">
			<td style="vertical-align:bottom" colspan="2"><input type="submit" name="updatecart" value="Atualizar carrinho"/></td>
			<td align="left" style="padding-left:80px;vertical-align:bottom;"><input type="submit" name="continue" value="Continuar a comprar" /></td>
			<td style="vertical-align:bottom" align="left"><button><a href="checkout.php" style="text-decoration:none; color:black;">Confirmar compra</a></button></td>
		</tr>
					
		</table> 
	</form>
			
	<?php 
	
	function updatecart(){
		
		global $con; 
		$ip = getIp();
		
		if(isset($_POST['updatecart'])){
		
			foreach($_POST['remove'] as $remove_id){
				$delete_product = "delete from carrinho where id_prod='$remove_id' AND ip_address='$ip'";
			
				$run_delete = mysqli_query($con, $delete_product); 
				if($run_delete){
					echo "<script>window.open('carrinho_compras.php','_self')</script>";
				}
			}
		}
		
		if(isset($_POST['continue'])){
			echo "<script>window.open('ingressos.php','_self')</script>";
		}
	}
	
	echo @$up_cart = updatecart();
	
	?>
	
	</div>

<?php include("inferior.php"); ?>