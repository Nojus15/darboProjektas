<?php

namespace MyApp\views;

class ProductView
{
    public function showAllProducts($products)
    {
        $view = "";
        $view .= '<form id="product-list" method="post">';

        foreach ($products as $product) {
            $DVD = "<div class='DVD'>Size: " . $product['size'] . " MB</div>";
            $Book = "<div class='Book'>Weight: " . $product['weight'] . "KG</div>";
            $Furniture = "<div class='furniture'>Dimensions: " . $product['height'] . "x" . $product['width'] . "x" . $product['length'] . "</div>";
            $type = array(
                'DVD' => $DVD,
                'Book' => $Book,
                'Furniture' => $Furniture,
            );
            $view .= '<div class="card">';
            $view .= '<input type="checkbox" class="delete-checkbox" id="' . $product['formID'] . '">';
            $view .= '<div class="sku">' . $product['sku'] . '</div>';
            $view .= '<div class="name">' . $product['name'] . '</div>';
            $view .= '<div class="price">' . $product['price'] . ' $</div>';
            $view .= $type[$product['productType']];
            $view .= '</div>';
        }
        $view .= '</form>';
        return $view;
    }
}
