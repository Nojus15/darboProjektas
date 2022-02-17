<?php

class dbh
{
    private static $connection = null;

    private static $host = 'sql11.freemysqlhosting.net';
    private static $port = '3306';
    private static $dbname = 'sql11472264';
    private static $user = 'sql11472264';
    private static $psw = 'hddkpS766W';

    public static function getPDO()
    {
        if (is_null(self::$connection)) {
            $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";";
            self::$connection = new PDO($dsn, self::$user, self::$psw);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }
}

class product
{
    protected function getProducts()
    {
        $statement = dbh::getPDO()->prepare("SELECT * FROM product_list");
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
    public function getSKU()
    {
        $statement = dbh::getPDO()->prepare("SELECT sku FROM product_list");
        $statement->execute();
        $sku = $statement->fetchAll(PDO::FETCH_COLUMN);

        return $sku;
    }
    public function setProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length)
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
    public function delProducts($ids)
    {
        foreach ($ids as $id) {
            $delete = dbh::getPDO()->prepare("DELETE FROM product_list WHERE formID = $id");
            $delete->execute();
        }
    }
}

class showProducts extends product
{
    public function showAllProducts()
    {
        foreach ($this->getProducts() as $product) {
            $DVD = "<div class='DVD'>Size: " . $product['size'] . " MB</div>";
            $Book = "<div class='Book'>Weight: " . $product['weight'] . "KG</div>";
            $Furniture = "<div class='furniture'>Dimensions: " . $product['height'] . "x" . $product['width'] . "x" . $product['length'] . "</div>";
            $type = array(
                'DVD' => $DVD,
                'Book' => $Book,
                'Furniture' => $Furniture,
            );
            echo '<div class="card">';
            echo '<input type="checkbox" class="delete-checkbox" id="' . $product['formID'] . '">';
            echo '<div class="sku">' . $product['sku'] . '</div>';
            echo '<div class="name">' . $product['name'] . '</div>';
            echo '<div class="price">' . $product['price'] . ' $</div>';
            echo $type[$product['productType']];
            echo '</div>';
        }
    }
}
