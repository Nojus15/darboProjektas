<?php

class ProductView extends Product
{
    public function showAllProducts()
    {
        $products = $this->getProducts();
        foreach ($products as $product) {
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
    public function showSKU()
    {
        $SKUs = $this->getSKU();
        return $SKUs;
    }
}
