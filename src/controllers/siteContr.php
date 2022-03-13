<?php

namespace MyApp\controllers;

class SiteContr
{
    private $errors = "";
    public function home()
    {
        $layouts = ['header', 'productListHeader', 'footer'];
        $products = new ProductContr();
        echo $this->renderPage($layouts, $products->showProducts());
    }
    public function add()
    {
        $layouts = ['header', 'productForm', 'footer'];
        echo $this->renderPage($layouts, $this->errors);
    }

    private function renderPage($layouts, $data)
    {
        $layoutContent = $this->renderLayouts($layouts);
        return str_replace('{{content}}', $data, $layoutContent);
    }
    private function renderLayouts($layouts)
    {
        ob_start();
        foreach ($layouts as $layout) {
            include_once __DIR__ . '/../../partials/' . $layout . '.php';
        }
        return ob_get_clean();
    }
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }
}
