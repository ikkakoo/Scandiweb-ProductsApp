<?php 
    include 'include_files/header.php';
    $category_index = 1;
?>
<div class="container">
    <form action="POST" action="add-product.php" id="product_form">
        <div class="form-group">
            <label>SKU</label>
            <input type="text" class="form-control" name="product">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="product">
        </div>
        <div class="form-group">
            <label>Price ($)</label>
            <input type="text" class="form-control" name="product">
        </div>
        <div class="form-group">
            <label>Type Switcher</label>
            <select name="category" class="form-select">
                <option value="0">Choose Type To Filter</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->type?>"><?php echo $category->type ?></option>
                <?php endforeach ; ?>
            </select>
        </div>
    </form>
</div>



<?php 
    include 'include_files/footer.php';
?>