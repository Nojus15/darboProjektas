<?php

require_once 'vendor/autoload.php';

use MyApp\controllers\ProductContr;

include_once './partials/header.php';
include_once './partials/productForm.php';
include_once './partials/footer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newProduct = new ProductContr();
    $newProduct->addNewProduct();
}
