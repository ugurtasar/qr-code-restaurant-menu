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
$onpage = $categoriesStore;
if(isset($_POST['submit'])){
	$datas['title'] = $_POST['title'];
	$datas['order'] = $_POST['order'];
	$datas['status'] = $_POST['status'];
	if($_FILES['image']['name'] != "") {
	$datas['image'] = uploadimg('image');
	}else{
	$datas['image'] = '';	
	}
	$onpage->insert($datas);
	$output = "Kategori eklendi.";
}
?>
<main class="flex-shrink-0">
	<div class="container">
		<h1 class="h4 text-uppercase">Yeni kategori ekle</h1>
		<?php if(isset($output)): ?>
		<div class="alert alert-success fw-bold" role="alert">
			<?php echo $output; ?>
		</div>
		<?php endif; ?>
		<form method="POST" action="" enctype="multipart/form-data"">
		<div class="row">
			<div class="col-12">
				<div class="form-outline mb-4">
					<label for="title" class="form-label">Başlık:</label>
					<input type="text" id="title" name="title" class="form-control" value="" required>
				</div>
				<div class="form-outline mb-4">
					<label for="order" class="form-label">Sıra:</label>
					<input type="text" id="order" name="order" class="form-control" onkeypress="return isNumber(event)" onpaste="return false;" value="<?php echo $onpage->count()+1; ?>" required>
				</div>
				<div class="mb-3">
				<label for="image" class="form-label">Görsel:</label>
				<input class="form-control" type="file" id="image" name="image">
				</div>
				<div class="form-outline mb-4">
				  <label for="status" class="form-label">Durum:</label>
				  <select class="form-select" id="status" name="status" required>
					<option value="aktif" selected>Aktif</option>
					<option value="pasif">Pasif</option>
				  </select>
				</div>
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary btn-block" value="onayla">
		</form>
	</div>
</main>
<?php include('footer.php'); ?>