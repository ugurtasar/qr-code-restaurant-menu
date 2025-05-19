<?php
/******************************************************
*******************************************************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
include('../inc/config.php');
if(isset($_SESSION['login'])) {
	header("Location: ".siteUrl().'/admin/index.php'); die();
}
if (isset($_POST['submit'])){
$password = md5($_POST['admin_password']);
if($password == $settings['password']){
	$_SESSION['login'] = true;
	header("Location: ".siteUrl().'/admin/login.php');
	die();
}else{
	$output = "<div class='alert alert-danger m-0 mt-2'>Şifre yanlış.</div>";
}
}
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/zephyr/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../uploads/main/favicon-3_1632843438.ico">
  <style>
	html,
	body {
	  height: 100%;
	}
	body {
	  display: flex;
	  align-items: center;
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #f5f5f5;
	}
	.form-signin {
	  width: 100%;
	  max-width: 330px;
	  padding: 15px;
	  margin: auto;
	}
	.form-signin .form-floating:focus-within {
	  z-index: 2;
	}
  </style>
</head>
<body class="text-center">
  <main class="form-signin">
	<form action="" method="post">
	<img src="../<?php echo $settings['logo']; ?>" class="img-fluid mb-4" alt="" width="170" height="auto">
	<h1 class="h4 mb-3 fs-5">Admin Panel</h1>
	  <div class="form-floating">
		<input type="password" class="form-control" id="floatingPassword" placeholder="Şifre" name="admin_password">
		<label for="floatingPassword">Şifre</label>
	  </div>
	  <?php if(isset($output)): ?>
	  <?php echo $output; ?>
	  <?php endif; ?>
		<button class="w-100 btn btn-primary mt-2" name="submit" type="submit">Giriş</button>
	</form>
  </main>
</body>
</html>
