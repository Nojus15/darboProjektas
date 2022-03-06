<?php

namespace MyApp\views;

class ProductView
{
    public function showAllProducts($products)
    {
        echo '<form id="product-list" method="post">';

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
        echo '</form>';
    }

    public function showError($errors)
    {
        if (!$errors['newSKU']) echo '<p class="invalid-feedback" style="display: block">SKU already exists</p>';
        if (!$errors['filledData']) echo '<p class="invalid-feedback" style="display: block">Please, submit required data</p>';
        if (!$errors['correctData']) echo '<p class="invalid-feedback" style="display: block">Please, provide the data of indicated type</p>';
    }
}
