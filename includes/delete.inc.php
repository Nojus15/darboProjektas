<?php
include 'autoClassLoader.inc.php';

$ids = $_POST['selected'];
$del = new ProductContr();
$del->deleteProducts($ids);
