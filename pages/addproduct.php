<?php 
    include 'include_files/header.php';
?>
<div class="container">
    <form method="post" action="add-product.php" id="product_form">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" name="sku" id="sku">
        </div>
        <br>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <br>
        <div class="form-group">
            <label>Price ($)</label>
            <input type="text" class="form-control" name="price" id="price">
        </div>
        <br>
        <div class="form-group">
            <label>Type Switcher</label>
            <select name="type" class="form-select" id="productType" name="productType">
                <option value="<?php echo isset($_POST['type']) ? $_POST['type'] : 'Please Select Product Type...' ?>"><?php echo isset($_POST['type']) ? $_POST['type'] : 'Please Select Product Type...' ?></option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->type?>"><?php echo $category->type ?></option>
                <?php endforeach ; ?>
            </select>
            <br>
            <button type="submit" class="btn btn-sm btn-success">Select</button>
            <?php     // type switcher
                if (isset($_POST['type'])) {
                    $type = $_POST['type'];
                } else {
                    $type = null;
                }
            ?>
        </div>
        <br>
        <div>
            <?php if ($type == 'Book'): ?>
                <label>Weight (kg)</label>
                <input type="text" class="form-control" name="attribute" id="weight" placeholder="Please Provide Weight in (kg)">
            <?php elseif ($type == 'DVD'): ?>
                <label>Size (mb)</label>
                <input type="text" class="form-control" name="attribute" id="size" placeholder="Please Provide Size in (mb)">
            <?php elseif($type == 'Furniture'): ?>
                <label>Height (cm)</label>
                <input type="text" class="form-control" name="height" id="height" placeholder="Please Provide Height in (cm)">
                <label>Width (cm)</label>
                <input type="text" class="form-control" name="width" id="width" placeholder="Please Provide Width in (cm)">
                <label>Length (cm)</label>
                <input type="text" class="form-control" name="length" id="length" placeholder="Please Provide Length in (cm)">    
            <?php endif; ?>    
        </div>
        <br>
        <input type="submit" name="submit" class="btn btn-secondary" value="Save" id="submit-product-form">
    </form>
</div>



<?php
    include 'include_files/footer.php';
?>