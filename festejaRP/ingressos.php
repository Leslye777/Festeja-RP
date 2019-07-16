<!DOCTYPE html5>
<?php include("superior.php"); ?>

	<style>
    .numero{
        text-decoration: none;
        background: #850844;
        text-align: center;
        padding: 3px 0;
        display: block;
        margin: 0 2px;
        float: left;
        width: 20px;
        color: #fff;
    }
    .numero:hover, .numativo, .controle:hover{
        background: black;
    }
    .controle{
        text-decoration: none;
        background: #850844;
        text-align: center;
        padding: 3px 8px;
        display: block;
        margin: 0 3px;
        float: left;
        color: #fff;
    }
	</style>
				
	<div id="content_area">
		<div id="ordenacao"><h5>Ordernar por:	
			<a href="ingressos.php?prec">preço</a>
			<a href="ingressos.php?data">data</a>
		</h5></div>
		<div id="produtos_box">
			<?php 
			add_carrinho();
			
			if(!isset($_GET['prec'])){
				if(!isset($_GET['cat'])){
					if(!isset($_GET['data'])){
						if(!isset($_GET['forn'])){
							if(!isset($_GET['search'])){
								getProdutos(); 
							}
						}
					}
				}
			}
			if(isset($_GET['prec'])){
				include("funcoes/filtro_preco.php");
				getProdPreco();
			}
			if(isset($_GET['cat'])){
				include("funcoes/filtro_categ.php");
				getProdCat();
			}
			if(isset($_GET['data'])){
				include("funcoes/filtro_data.php");
				getProdData();
			}
			if(isset($_GET['forn'])){
				include("funcoes/filtro_forn.php");
				getProdForn();
			}
			if(isset($_GET['search'])){
				include("funcoes/pesquisa.php");
				getProdPesq();
			}
					
			?>
		</div>
	</div>

<?php include("inferior.php"); ?>