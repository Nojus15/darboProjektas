<?php

namespace MyApp\controllers;

use MyApp\models\Product;
use MyApp\views\ProductView;
use MyApp\includes\ProductValidate;

class ProductContr extends Product
{
    protected $products;                        // array of products
    protected $existingSKUs;                    // sku validation

    public function showProducts()
    {
        $this->products = $this->getProductsData();
        $showProducts = new ProductView();
        return $showProducts->showAllProducts($this->products);
    }

    public function addNewProduct()
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $productType = $_POST['productType'];
        $size = $_POST['size'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];

        $this->existingSKUs = $this->getSKU();

        $validator = new ProductValidate();

        if ($validator->validateData($this->existingSKUs, $sku, $name, $price, $productType, $size, $weight, $height, $width, $length)) {
            $this->setProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
            // echo "<script>location.href='index.php';</script>";
            header("Location: /");
        }
    }

    public function deleteProducts()
    {
        $ids = json_decode($_POST['selected']);
        foreach ($ids as $id) {
            $this->delProduct($id);
        }
        header("Location: /");
    }
}
