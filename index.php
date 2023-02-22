<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
include('inc/config.php');
$categories = $categoriesStore->findBy(["status","=","aktif"],["order" => "asc"]);
?>
<!doctype html>
<html lang="tr" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $settings['site_title']; ?></title>
	<link href="css/<?php echo $settings['site_theme']; ?>/bootstrap.min.css" rel="stylesheet">
	<link href="css/simpleLightbox.min.css" rel="stylesheet">
	<link href="css/bootstrap-icons.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="d-flex align-items-center min-vh-100">
<div class="container mb-3">
<header class="text-center py-3 mt-2">
<img src="<?php echo $settings['logo']; ?>" width="200" class="img-fluid my-4" />
</header>
<?php
foreach($categories as $categoriesVal):
$products = $productsStore->findBy([["category", "=", $categoriesVal['_id']],"AND",["status","=","aktif"]], ["order" => "asc"]);
?>
<?php if(empty($categoriesVal['image'])): ?>
<h2 class="d-block mb-4 text-uppercase fw-bold fs-3"><?php echo $categoriesVal['title']; ?></h2>
<?php else: ?>
<div class="d-block mb-4 text-uppercase fw-bold bg-head rounded-3 overflow-hidden position-relative" style="background-image: url('<?php echo $categoriesVal['image']; ?>');">
	<h2 class="position-relative m-0 bg-primary d-inline-block bg-gradient px-3 py-2 rounded-3 fw-bold text-light"><?php echo $categoriesVal['title']; ?></h2>
</div>
<?php endif; ?>
<?php if(!empty($products)): ?>
<div class="row row-cols-2 row-cols-md-4 g-4 mb-4">
<?php foreach($products as $productsVal): ?>
  <div class="col">
	<div class="card h-100 border-0 rounded-2 shadow-none overflow-hidden">
	  <a class="productsimg" href="<?php echo $productsVal['image']; ?>" title="<?php echo $productsVal['title']; ?>">
	  <img src="<?php echo $productsVal['image']; ?>" class="card-img-top rounded-3 shadow-lg" alt="<?php echo $productsVal['title']; ?>">
	  </a>
	  <div class="card-body d-flex flex-column py-3 px-2">
		<h5 class="card-title fs-4"><?php echo $productsVal['title']; ?></h5>
		<?php if(!empty($productsVal['title_alt'])): ?>
		<p class="card-text m-0"><?php echo $productsVal['title_alt']; ?></p>
		<?php endif; ?>
		<p class="card-text fs-2 fw-bold"><?php echo $productsVal['price']; ?> <?php echo $settings['currency']; ?></p>
	  </div>
	</div>
  </div>
 <?php endforeach; ?>
</div>
<?php else: ?>
<div class="alert alert-info" role="alert">
<?php echo $categoriesVal['title']; ?> kategorimizdeki ürünleri servis yapamıyoruz ancak en yakın zamanda aktifleştireceğiz.
</div>
<?php endif; ?>
<?php endforeach; ?>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/simpleLightbox.min.js"></script>
<script>
$('.productsimg').simpleLightbox();
</script>
</body>
</html>