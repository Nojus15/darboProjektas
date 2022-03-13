<nav>
    <h1>Product list</h1>
    <div>
        <button type="submit" form="product_form" class="btn btn-light" id="save">Save</button>
        <a class="btn btn-light" href="./">Cancel</a>
    </div>
</nav>
<form id="product_form" method="post">
    <div class=" input-row">
        <label for="sku" class="column-text">SKU</label>
        <input type="text" id="sku" class="column-input form-control" name="sku">
    </div>
    <div class="input-row">
        <label for="name" class="column-text">Name</label>
        <input type="text" id="name" class="column-input form-control" name="name">
    </div>
    <div class="input-row">
        <label for="price" class="column-text">Price ($)</label>
        <input type="text" id="price" class="column-input form-control" name="price">
    </div>
    <div class="input-row">
        <label for="productType" class="column-text">Type Switcher</label>
        <select name="productType" id="productType" class="column-input form-control">
            <option value="TypeSwitcher">Type Switcher</option>
            <option value="DVD">DVD</option>
            <option value="Furniture">Furniture</option>
            <option value="Book">Book</option>
        </select>
    </div>
    <div name="TypeSwitcher" id="TypeSwitcher" class="option">
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

    <p class="invalid-feedback" id="newSKU" style="display: none">SKU already exists</p>
    <p class="invalid-feedback" id="filledData" style="display: none">Please, submit required data</p>
    <p class="invalid-feedback" id="correctData" style="display: none">Please, provide the data of indicated type</p>
</form>