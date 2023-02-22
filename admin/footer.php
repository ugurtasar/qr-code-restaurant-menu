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
<footer class="footer mt-auto py-3 bg-primary">
	<div class="container text-center">
		<span class="text-light">©<?php echo date("Y"); ?> <?php echo $settings['site_title']; ?></span>
	</div>
</footer>
<script src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">     
function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if ( (charCode > 31 && charCode < 48) || charCode > 57) {
			return false;
		}
		return true;
	}
</script>
</body>
</html>