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
$onpage = $settingsStore;
$datas = $onpage->findById(1);
if(isset($_POST['submit'])){
	$datas['_id'] = 1;
	$datas['site_theme'] = $_POST['site_theme'];
	$datas['admin_theme'] = $_POST['admin_theme'];
	$datas['site_title'] = $_POST['site_title'];
	$datas['currency'] = $_POST['currency'];
	$datas['qrsize'] = $_POST['qrsize'];
	if(!empty($_POST['password'])){
		$datas['password'] = md5($_POST['password']);	
	}
	if($_FILES['logo']['name'] != "") {
	$datas['logo'] = uploadimg('logo','update');
	}
	$onpage->updateOrInsert($datas);
	$output = "Site ayarları güncellendi.";
}
$datas = $onpage->findById(1);
$settings = $datas;
$themes = $themesStore->findAll(["name" => "asc"]);
include('header.php');
?>
<main class="flex-shrink-0">
	<div class="container">
		<h1 class="h4 text-uppercase">Sistem Ayarları</h1>
		<?php if(isset($output)): ?>
		<div class="alert alert-success fw-bold" role="alert">
			<?php echo $output; ?>
		</div>
		<?php endif; ?>
		<form method="POST" action="" enctype="multipart/form-data"">
		<div class="row">
			<div class="col-12">
				<div class="mb-3">
				<label for="logo" class="form-label">Site logo:</label>
				<img src="../<?php echo $datas['logo']; ?>" class="img-thumbnail d-block mb-2" alt="" width="170">
				<input class="form-control" type="file" id="logo" name="logo">
				</div>
				<div class="form-outline mb-4">
					<label for="site_title" class="form-label">Site başlık:</label>
					<input type="text" id="site_title" name="site_title" class="form-control" value="<?php echo $datas['site_title']; ?>" required>
				</div>
				<div class="form-outline mb-4">
				<label for="site_theme" class="form-label">Site Teması:</label>
				<select class="form-select" id="site_theme" name="site_theme" required>
				<?php foreach($themes as $themesVal): ?>
				<option value="<?php echo $themesVal['value']; ?>" <?php if($themesVal['value'] == $datas['site_theme']){echo 'selected';} ?>><?php echo $themesVal['name']; ?></option>
				<?php endforeach; ?>
				</select>
				</div>
				<div class="form-outline mb-4">
				<label for="admin_theme" class="form-label">Admin Teması:</label>
				<select class="form-select" id="admin_theme" name="admin_theme" required>
				<?php foreach($themes as $themesVal): ?>
				<option value="<?php echo $themesVal['value']; ?>" <?php if($themesVal['value'] == $datas['admin_theme']){echo 'selected';} ?>><?php echo $themesVal['name']; ?></option>
				<?php endforeach; ?>
				</select>
				</div>
				<div class="form-outline mb-4">
					<label for="currency" class="form-label">Para birimi:</label>
					<input type="text" id="currency" name="currency" class="form-control" value="<?php echo $datas['currency']; ?>" required>
				</div>
				<div class="form-outline mb-4">
					<label for="qrsize" class="form-label">QR Kod Boyutu:</label>
					<input type="text" id="qrsize" name="qrsize" class="form-control" onkeypress="return isNumber(event)" onpaste="return false;" value="<?php echo $datas['qrsize']; ?>" required>
				</div>
				<div class="form-outline">
					<label for="password" class="form-label">Admin Şifresi:</label>
					<input type="password" id="password" name="password" class="form-control" value="">
					<small>değiştirmeyecekseniz boş bırakınız.</small>
				</div>
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary btn-block mt-3" value="onayla">
		</form>
	</div>
</main>
<?php include('footer.php'); ?>