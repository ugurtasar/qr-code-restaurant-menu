<?php
/******************************************************
*******************************************************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
include('../inc/config.php');
include('session.php');
include('header.php');
$onpage = $categoriesStore;
$datas = $onpage->findById(intval($_GET['id']));
if(isset($_POST['submit'])){
	$datas['title'] = $_POST['title'];
	$datas['order'] = $_POST['order'];
	$datas['status'] = $_POST['status'];
	if($_FILES['image']['name'] != "") {
	$datas['image'] = uploadimg('image','update');
	}
	$onpage->update($datas);
	$output = "Kategori düzenlendi.";
}
$datas = $onpage->findById(intval($_GET['id']));
?>
<main class="flex-shrink-0">
	<div class="container">
		<h1 class="h4 text-uppercase"><?php echo $datas['title']; ?> Düzenle</h1>
		<?php if(isset($output)): ?>
		<div class="alert alert-success fw-bold" role="alert">
			<?php echo $output; ?>
		</div>
		<?php endif; ?>
		<form method="POST" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-12">
				<div class="form-outline mb-4">
					<label for="title" class="form-label">Başlık:</label>
					<input type="text" id="title" name="title" class="form-control" value="<?php echo $datas['title']; ?>" required>
				</div>
				<div class="form-outline mb-4">
					<label for="order" class="form-label">Sıra:</label>
					<input type="text" id="order" name="order" class="form-control" onkeypress="return isNumber(event)" onpaste="return false;" value="<?php echo $datas['order']; ?>" required>
				</div>
				<div class="mb-3">
				<label for="image" class="form-label">Görsel:</label>
				<?php if(!empty($datas['image'])): ?>
				<img src="../<?php echo $datas['image']; ?>" class="img-thumbnail d-block mb-2" alt="" width="220">
				<?php endif; ?>
				<input class="form-control" type="file" id="image" name="image">
				</div>
				<div class="form-outline mb-4">
				  <label for="status" class="form-label">Durum:</label>
				  <select class="form-select" id="status" name="status" required>
					<option value="aktif" <?php if($datas['status'] == 'aktif'){echo 'selected';} ?>>Aktif</option>
					<option value="pasif" <?php if($datas['status'] == 'pasif'){echo 'selected';} ?>>Pasif</option>
				  </select>
				</div>
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary btn-block" value="onayla">
		</form>
	</div>
</main>
<?php include('footer.php'); ?>
