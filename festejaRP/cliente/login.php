<div id="tabela_img"> 
	
	<form method="post" action=""> 
		<table align="center"> 	
			<tr>
				<td align="left"><b>E-mail:</b></td>
			</tr>
			<tr>
				<td><input type="text" name="email" placeholder="Insira seu e-mail" required/></td>
			</tr>
			<tr>
				<td align="left"><b>Senha:</b></td>
			</tr>
			<tr>
				<td><input type="password" name="senha" placeholder="Insira sua senha" required/></td>
			</tr>
			<tr align="center">
				<td><h6><a href="checkout.php?forgot_pass">Esqueci a senha</a></h6></td>
			</tr>
			<tr align="center">
				<td><input type="submit" name="login" value="Login" /></td>
			</tr>
		</table> 
	
	</form>
	
	
	<?php fazer_login(); ?>
	
	
	

</div>