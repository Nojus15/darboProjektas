<?php

require_once 'vendor/autoload.php';

use MyApp\controllers\ProductContr;

if (isset($_POST['submit'])) Header("Location: /newProduct");

include_once './partials/header.php';
include_once './partials/productListHeader.php';

$products = new ProductContr();
$products->showProducts();

if (isset($_POST['selected'])) {
	$ids = json_decode($_POST['selected']);
	$del = new ProductContr();
	$del->deleteProducts($ids);

	// used this code below to update list page without reloading, but then the AutoQA somehow detects checkboxes
	//$view = new ProductView();
	//$view->showAllProducts();

}

include_once './partials/footer.php';
