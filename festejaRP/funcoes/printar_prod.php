<?php
	echo "
		<div id='produto_unico'>
				
			<h3 style='background: #DDDDDD;'>$nome_produto</h3>
			
			<img src='admin_area/produto_imgs/$img_produto'/>
				
			<h3 style='background: #DDDDDD;'><b>R$ $preco_produto,00 </b></h3>
					
			<div class='dropdown'>
				<button onclick='myFunction($id_produto)' class='dropbtn'>Mais informações</button>
				<div id='$id_produto' class='dropdown-content'>
					<p>$desc_produto</p>
					</br>
					<h3 style='text-align:center;color:#9d3969;'><b>$dia_produto/$mes_produto/$ano_produto </b></h3>
				</div>
			</div>
					
			<a href='ingressos.php?add_cart=$id_produto'><button style='padding-top:5px;float:right;border:none;background:transparent;'><i class='material-icons'>&#xE854;</i></button></a>
				
		</div>
		
		
	";
?>