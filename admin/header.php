<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
?>
<!doctype html>
<html lang="tr" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	<link href="../css/<?php echo $settings['admin_theme']; ?>/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-icons.css" rel="stylesheet">
	<style>
		.container{max-width: 850px;}
		label, .btn{text-transform:uppercase;}
	</style>
</head>
<body class="d-flex flex-column h-100">
	<header class="mb-3">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="index.php">Admin Panel</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-uppercase" id="navbarCollapse">
					<ul class="navbar-nav ms-auto mb-2 mb-md-0 mt-2 mt-md-0">
						<li class="nav-item mx-0 mx-md-2">
							<a class="nav-link active px-2 mx-md-0" href="../" target="_blank">Menüye git</a>
						</li>
						<li class="nav-item mx-0 mx-md-2 dropdown">
							<a class="nav-link dropdown-toggle px-2 mx-md-0" href="#" id="urunler" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Ürünler
							</a>
							<ul class="dropdown-menu" aria-labelledby="urunler">
								<li><a class="dropdown-item" href="products_add.php"><i class="bi bi-plus-square"></i> Yeni Ürün Ekle</a></li>
								<li><a class="dropdown-item" href="products.php">Tüm Ürünler</a></li>
							</ul>
						</li>
						<li class="nav-item mx-0 mx-md-2 dropdown">
							<a class="nav-link dropdown-toggle px-2 mx-md-0" href="#" id="kategoriler" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Kategoriler
							</a>
							<ul class="dropdown-menu" aria-labelledby="kategoriler">
								<li><a class="dropdown-item" href="categories_add.php"><i class="bi bi-plus-square"></i> Yeni Kategori Ekle</a></li>
								<li><a class="dropdown-item" href="categories.php">Tüm Kategoriler</a></li>
							</ul>
						</li>
						<li class="nav-item mx-0 mx-md-2">
							<a class="nav-link px-2 mx-md-0" href="settings.php">Ayarlar</a>
						</li>
						<li class="nav-item mx-0 mx-md-2">
							<a class="nav-link px-2 mx-md-0" href="logout.php">Çıkış Yap</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>