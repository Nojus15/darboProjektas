<?php

abstract class Product
{
    protected function getProducts()
    {
        $statement = dbh::getPDO()->prepare("SELECT * FROM product_list");
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
    protected function getSKU()
    {
        $statement = dbh::getPDO()->prepare("SELECT sku FROM product_list");
        $statement->execute();
        $sku = $statement->fetchAll(PDO::FETCH_COLUMN);

        return $sku;
    }
    protected function setProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length)
    {
        $insert = dbh::getPDO()->prepare("INSERT INTO product_list (sku,name,price,productType,size,weight,height,width,length) VALUES (:sku,:name,:price,:productType,:size,:weight,:height,:width,:length)");
        $insert->bindValue(':sku', $sku);
        $insert->bindValue(':name', $name);
        $insert->bindValue(':price', $price);
        $insert->bindValue(':productType', $productType);
        $insert->bindValue(':size', $size);
        $insert->bindValue(':weight', $weight);
        $insert->bindValue(':height', $height);
        $insert->bindValue(':width', $width);
        $insert->bindValue(':length', $length);
        $insert->execute();
    }
    protected function delProduct($id)
    {
        $delete = dbh::getPDO()->prepare("DELETE FROM product_list WHERE formID = $id");
        $delete->execute();
    }
}
