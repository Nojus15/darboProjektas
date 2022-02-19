<?php

class ProductContr extends Product
{
    public function addNewProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length)
    {
        $this->setProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
    }

    public function deleteProducts($ids)
    {
        foreach ($ids as $id) {
            $this->delProduct($id);
        }
    }
}
