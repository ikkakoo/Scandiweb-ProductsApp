<?php 
    include 'include_files/header.php';
    $category_index = 1;
?>
<div class="container">
    <form method="post" action="add-product.php" id="product_form">
        <div class="form-group">
            <label>SKU</label>
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
            <select name="type" class="form-select" id="productType">
                <option value="0">Choose Type To Filter</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->type?>"><?php echo $category->type ?></option>
                <?php endforeach ; ?>
            </select>
            <br>
            <input type="submit" class="btn btn-sm btn-success" value="Select">
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
                <input type="text" class="form-control" name="attribute" id="weight">
            <?php elseif ($type == 'Disc'): ?>
                <label>Size (mb)</label>
                <input type="text" class="form-control" name="attribute" id="size">
            <?php elseif($type == 'Furniture'): ?>
                <label>Height (cm)</label>
                <input type="text" class="form-control" name="attribute" id="height">
                <label>Width (cm)</label>
                <input type="text" class="form-control" name="attribute" id="width">
                <label>Length (cm)</label>
                <input type="text" class="form-control" name="attribute" id="length">
            <?php else: ?>
                <?php echo "Please Select Product Type" ?>      
            <?php endif; ?>    
        </div>
        <input type="submit" name="submit" class="btn btn-secondary" value="Submit" id="">
    </form>
</div>



<?php 
    include 'include_files/footer.php';
?>