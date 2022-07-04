<?php 
    include 'include_files/header.php';
    $category_index = 1;
?>

    <form action="index.php" method="GET" class="container d-flex flex-column gap-1 mt-2">
        <select name="category" class="form-select">
            <option value="0">Choose Type To Filter</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category->type?>"><?php echo $category->type ?></option>
            <?php endforeach ; ?>
        </select>
        <input type="submit" class="btn btn-lg btn-success" value="Find">
    </form>
    


<div class="d-flex justify-content-center flex-wrap gap-5 p-5">
    <?php foreach($products as $product): ?>
        <div class="card text-bg-light mb-3" style="width: 18rem;">
            <div class="card-header d-flex justify-content-between">
                <div><?php echo $product->type ?></div>
                <form action="index.php" method="post" name="check">
                    <input type="checkbox" class="delete-checkbox" name="delete[]" value="<?= $product->sku; ?>" style="width: 1.2em;">
                </form>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $product->sku ?> - <?php echo $product->name ?></h5>
                <p class="card-text"><?php echo $product->price ?> $</p>
                <?php if ($product->type == 'Book'): ?>
                    <p class="card-text">Weight: <?php echo $product->attribute ?></p>
                <?php elseif ($product->type == 'Disc'): ?>    
                    <p class="card-text">Size: <?php echo $product->attribute ?></p>
                <?php else: ?>
                    <p class="card-text">Dimensions: <?php echo $product->attribute ?></p>    
                <?php endif; ?>    
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php 
    include 'include_files/footer.php';
?>