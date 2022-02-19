<?php
include 'includes/autoClassLoader.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

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
			<a href="./add_product.php" class="btn btn-light" id="add">ADD</a>
			<button form="product-list" class="btn btn-light" id="delete">MASS DELETE</button>
		</div>
	</nav>
	<form id="product-list" method="post">
		<?php
		$products = new ProductView();
		$products->showAllProducts();
		?>
	</form>

	<script>
		var selected = [];
		$('#delete').click(function() {
			$('.delete-checkbox').each(function(e) {
				console.log($(this).attr('id'));
				if ($(this).prop("checked")) {
					console.log("selected " + $(this).attr('id'));
					selected.push($(this).attr('id'));
				}
			});
			console.log(selected);
			$.post('index.php', {
				selected: JSON.stringify(selected)
			});
			$.post(
				'includes/delete.inc.php', {
					selected: selected,
				},
			)
		})
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<!-- C:\xampp\htdocs\product\index.php -->