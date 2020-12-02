<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
	<title><?php echo $name_title; ?></title>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row menu">
			<div class="col">
				<h4><a href="#">MENU</a></h4>
			</div>
		</div>
		<!----Content e SideBar---->
		<div class="row">
			<div class="col-2 side_bar">
				<img src="<?php echo BASE_URL; ?>/assets/images/icon-perfil.png" class="img-fluid float-center" class="img_logo">
				<!---Menu vertical-->
				<div class="menu_vertical">
					<ul>
						<li><a href="index.php">Estoque</a></li>
						<li><a href="produtos.php">Produtos</a></li>
						<li><a href="entradas.php">Entradas</a></li>
						<li><a href="saidas.php">Saídas</a></li>
						<li><a href="fornecedores.php">Fornecedores</a></li>
						<li><a href="cadastrar_estoque.php">Cadastrar Estoque</a></li>
					</ul>
				</div>
			</div>
		<?php $this->load_view_in_templete($view_name, $view_data); ?>

		<div class="row footer justify-content-center">
			2020 | Feito por Patricia Gomes
		</div>

	<script type="text/javascript" > var BASE_URL = '<?php echo BASE_URL; ?>'; </script>
	<!---Jquery--->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.5.1.min.js"></script>
	<!---JS--->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>