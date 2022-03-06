<?php

namespace MyApp\includes;

class ProductValidate
{
    private $newSKU = true;
    private $correctData = true;
    private $filledData = true;

    private $validator = array(
        'TypeSwitcher' => ['none'],
        'DVD' => ['size'],
        'Book' => ['weight'],
        'Furniture' => ['height', 'width', 'length'],
    );


    public function validateData($existingSKUs, $sku, $name, $price, $productType, $size, $weight, $height, $width, $length)
    {
        foreach ($existingSKUs as $eSKU) {
            if ($eSKU == $sku) $this->newSKU = false;
        }

        if ($productType != 'TypeSwitcher') {
            foreach ($this->validator[$productType] as $input) {
                if (empty($_POST[$input])) $this->filledData = false;
                else if (!is_numeric($_POST[$input])) $this->correctData = false;
            }
        }

        if (!is_string($sku) || !is_string($name) || !is_numeric($price)) $this->correctData = false;
        if (empty($sku) || empty($name) || empty($price) || $productType == 'TypeSwitcher') $this->filledData = false;

        if ($this->correctData && $this->filledData && $this->newSKU) return true;
        else return false;
    }
    public function getErrors()
    {
        return array(
            'newSKU' => $this->newSKU,
            'correctData' => $this->correctData,
            'filledData' => $this->filledData,
        );
    }
}
