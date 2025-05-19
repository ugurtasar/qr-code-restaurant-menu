<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
if(!isset($_SESSION['login'])) {
	header("Location: ".siteUrl().'/admin/login.php'); die();
}
?>
