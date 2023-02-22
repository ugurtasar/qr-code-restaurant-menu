<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
include('../inc/config.php');
include('session.php');
include('header.php');
$passiveproducts = $productsStore->findBy(["status","=","pasif"], ["order" => "desc"]);
if(isset($_GET['qr'])){
	$qrname = 'qr_'.time().'.png';
	chmod($settings['qrfile'],0777);
	unlink($settings['qrfile']);
	QRcode::png(siteURL(), $qrname, QR_ECLEVEL_L, intval($settings['qrsize']));
	$settings["qrfile"] = $qrname;
	$settingsStore->update($settings);
}
?>
<main class="flex-shrink-0">
	<div class="container">
		<?php if(!empty($passiveproducts)): ?>
		<div class="alert alert-danger">
		<h1 class="h3">PASİF ÜRÜNLER</h1>
		<div class="list-group">
		<?php foreach($passiveproducts as $passiveproductsVal): ?>
		  <a href="products_edit.php?id=<?php echo $passiveproductsVal['_id']; ?>" class="list-group-item list-group-item-action"><?php echo $passiveproductsVal['title']; ?></a>
		<?php endforeach; ?>  
		</div>
		</div>
		<?php endif; ?>
		<div class="alert alert-info mt-3" role="alert">
			QR kodu tasarımınızda kullanmadan önce telefonunuzdan test ediniz. Emin olduktan sonra sağ tıklayıp png olarak kaydedebilirsiniz.
			<p class="mt-3 mb-0 fw-bold">QR KOD URL: <a href="<?php echo siteURL(); ?>" class="link-primary" target="_blank"><?php echo siteURL(); ?></a></p>
		</div>
		<a href="index.php?qr" class="btn btn-primary">qr kodu yeniden oluştur</a>
		<img src="<?php echo $settings['qrfile']; ?>" class="img-fluid border d-block my-3" />
	</div>
</main>
<?php include('footer.php'); ?>