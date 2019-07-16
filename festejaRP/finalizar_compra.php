<!DOCTYPE html5>
<?php include("superior.php"); ?>
				
	<div id="content_area">
	<?php 
		if(!isset($_SESSION['customer_email'])){
			include("customer_login.php");
		}else {
			include("payment.php");
		}
	?>	
	</div>

<?php include("inferior.php"); ?>