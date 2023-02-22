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
$datas = $onpage->findAll(["order" => "desc"]);
if(isset($_GET['id'])){
	$onpage->deleteById(intval($_GET['id']));
}
$datas = $onpage->findAll(["order" => "desc"]);
?>
<main class="flex-shrink-0">
	<div class="container">
		<h1 class="h4 text-uppercase">Kategoriler</h1>
		<a href="categories_add.php" class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus-square"></i> yeni kategori ekle</a>
		<div class="table-responsive">
			<table class="table table-bordered text-uppercase text-center">
			  <thead>
				<tr>
				  <th scope="col">Kategori Adı</th>
				  <th scope="col">Ürün Sayısı</th>
				  <th scope="col">Sıra</th>
				  <th scope="col">Durum</th>
				  <th scope="col">İşlem</th>
				</tr>
			  </thead>
			  <tbody>
				<?php 
				foreach($datas as $datasVal):
				$countProducts = $productsStore->findBy(["category", "=", $datasVal['_id']]); 
				?>
				<tr>
				  <td class="align-middle"><?php echo $datasVal['title']; ?></td>
				  <td class="align-middle"><?php echo count($countProducts); ?> adet</td>
				  <td class="align-middle"><?php echo $datasVal['order']; ?></td>
				  <td class="align-middle"><?php echo $datasVal['status']; ?></td>
				  <td class="align-middle">
				  <div class="btn-group">
					<a href="categories_edit.php?id=<?php echo $datasVal['_id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
					<a href="categories.php?id=<?php echo $datasVal['_id']; ?>" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></a>
				  </div>
				  </td>
				</tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
		  </div>
	</div>
</main>
<?php include('footer.php'); ?>