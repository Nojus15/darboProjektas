<?php
require './classes.php';
$ids = $_POST['selected'];
$del = new product();
$del->delProducts($ids);
