<h2 style="text-align:center;">Change Your Password</h2>
<form action="" method="post"> 
	
	<p>Digite a senha atual: </p><input type="password" name="senha_atual" required>
	<p>Digite a nova senha: </p><input type="password" name="nova_senha" required></td>
	<p>Digite novamente:</p><input type="password" name="nova_senha_confirm" required></td>
	<input type="submit" name="mudar_senha" value="Change Password"/>
	
</form>

<?php alterarSenha(); ?>