<?php
include 'includes/autoClassLoader.inc.php';

$valid = array(
    'DVD' => ['size'],
    'Book' => ['weight'],
    'Furniture' => ['height', 'width', 'length'],
);

$sku = "";
$name = "";
$price = "";

$getSKU = new ProductView;
$existingSKU = $getSKU->showSKU();

$newSKU = true;
$correctData = true;
$filledData = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $post = $_POST;

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productType = $_POST['productType'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];

    foreach ($existingSKU as $eSKU) {
        if ($eSKU == $sku) $newSKU = false;
    }

    if (!empty($productType)) {
        foreach ($valid[$productType] as $input) {
            if (empty($_POST[$input])) $filledData = false;
            if (!is_numeric($_POST[$input])) $correctData = false;
        }
    }

    if (!is_string($sku) || !is_string($name) || !is_numeric($price)) $correctData = false;
    if (empty($sku) || empty($name) || empty($price) || empty($productType)) $filledData = false;

    if ($correctData && $filledData && $newSKU) {
        $insert = new ProductContr();
        $insert->addNewProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
        header("Location: ./index.php");
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav>
        <h1>Product list</h1>
        <div>
            <button type="submit" form="product_form" class="btn btn-light" id="save">Save</button>
            <a class="btn btn-light" href="./">Cancel</a>
        </div>
    </nav>
    <form id="product_form" method="post">
        <div class="input-row">
            <label for="sku" class="column-text">SKU</label>
            <input type="text" id="sku" class="column-input form-control" name="sku" value="<?php echo $sku ?>">
        </div>
        <div class="input-row">
            <label for="name" class="column-text">Name</label>
            <input type="text" id="name" class="column-input form-control" name="name" value="<?php echo $name ?>">
        </div>
        <div class="input-row">
            <label for="price" class="column-text">Price ($)</label>
            <input type="text" id="price" class="column-input form-control" name="price" value="<?php echo $price ?>">
        </div>
        <div class="input-row">
            <label for="productType" class="column-text">Type Switcher</label>
            <select name="productType" id="productType" class="column-input form-control">
                <option value="">Type Switcher</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
                <option value="Book">Book</option>
            </select>
        </div>
        <div name="none" id="none" class="option">
        </div>
        <div name="DVD" id="DVD" class="option">
            <div class="input-row">
                <label for="size" class="column-text">Size (MB)</label>
                <input type="text" id="size" class="column-input form-control DVD" name="size">
            </div>
            <p>Please, provide size</p>
        </div>

        <div name="Furniture" id="Furniture" class="option">
            <div class="input-row">
                <label for="height" class="column-text">Height (CM)</label>
                <input type="text" id="height" class="column-input form-control Furniture" name="height">
            </div>
            <div class="input-row">
                <label for="width" class="column-text">Width (CM)</label>
                <input type="text" id="width" class="column-input form-control Furniture" name="width">
            </div>
            <div class="input-row">
                <label for="length" class="column-text">length (CM)</label>
                <input type="text" id="length" class="column-input form-control Furniture" name="length">
            </div>
            <p>Please, provide dimensions</p>
        </div>

        <div name="Book" id="Book" class="option">
            <div class="input-row">
                <label for="weight" class="column-text">Weight (KG)</label>
                <input type="text" id="weight" class="column-input form-control Book" name="weight">
            </div>
            <p>Please, provide weight</p>
        </div>
        <?php
        if (!$newSKU) echo '<p class="invalid-feedback" style="display: block">SKU already exists</p>';
        else if (!$filledData) echo '<p class="invalid-feedback" style="display: block">Please, submit required data</p>';
        else if (!$correctData) echo '<p class="invalid-feedback" style="display: block">Please, provide the data of indicated type</p>';
        ?>

        <script>
            var selectedID;
            $('select#productType').on("change", function() {
                $("#" + $(this).val()).show().siblings(".option").hide();
            });
        </script>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>