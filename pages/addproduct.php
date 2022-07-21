<?php 
    include 'include_files/header.php';
    require_once '../helpers/system_helper.php';
    require_once '../libraries/Validator.php';


    $new_product = new Product;

    if (isset($_POST['submit'])) {
        $validation = new Validator($_POST);

        $errors = $validation->validate_form();
        // var_dump($_POST);

        // insert into db if errors is empty
        if (empty($errors)) {
            $product_data = [];
            $product_data['sku'] = $_POST['sku'];
            $product_data['name'] = $_POST['name'];
            $product_data['type'] = $_POST['type'];
            $product_data['price'] = $_POST['price'];
            if ($product_data['type'] === 'Furniture') {
                $product_data['attribute'] = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'];
            } elseif ($product_data['type'] == 'Book') {
                $product_data['attribute'] = $_POST['weight'];
            } else {
                $product_data['attribute'] = $_POST['size'];
            }
            
            
            // print_r($product_data);
            if ($new_product->add_product($product_data)) {
                redirect('index.php', 'Your Product Has Been Added', 'success');
            } else {
                redirect('index.php', 'Something Went Wrong', 'error');
            }
        }
    }
?>

<div class="container" id="product_form">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="product_form">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" class="form-control <?php echo $errors['sku'] ?  'is-invalid' : null;?>" name="sku" id="sku">
            <div class="invalid-feedback">
                <?php echo $errors['sku'] ?? ''; ?>
            </div>
        </div>
        
        <br>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control <?php echo $errors['name'] ?  'is-invalid' : null;?>" name="name" id="name">
            <div class="invalid-feedback">
                <?php echo $errors['name'] ?? ''; ?>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Price ($)</label>
            <input type="number" class="form-control <?php echo $errors['price'] ?  'is-invalid' : null;?>" name="price" id="price">
            <div class="invalid-feedback">
                <?php echo $errors['price'] ?? ''; ?>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Type Switcher</label>
            <select name="type" class="form-select" id="productType" name="productType" onclick="getSelectedValue()">
                <option value="0">Please Select Product Type...</option>
                <option value="Book">Book</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
            </select>
            <br>
        </div>
        <div id="selectedValueInp">
            <div id="weight-input" class="hidden">
                <input type="text" name="weight" id="weight" class="form-control" placeholder="Please Provide Weight in (kg)">
                <div class="invalid-feedback">
                    
                </div>
            </div>

            <div id="size-input" class="hidden">
                <input type="text" name="size" id="size" class="form-control" placeholder="Please Provide Size in (mb)">
                <div class="invalid-feedback">
                   
                </div>
            </div>

            <div id="furniture-inputs" class="hidden">
                <input type="text" class="form-control mb-1" name="height" id="height" placeholder="Please Provide Height in (cm)">
                <div class="invalid-feedback">
                    
                </div>
                <input type="text" class="form-control mb-1" name="width" id="width" placeholder="Please Provide Width in (cm)">
                <div class="invalid-feedback">
                    
                </div>
                <input type="text" class="form-control " name="length" id="length" placeholder="Please Provide Length in (cm)">
                <div class="invalid-feedback">
                    
                </div>
            </div>
            
        </div>
        <br>
        <input type="submit" name="submit" class="btn btn-secondary" value="Save" id="submit-product-form">
    </form>
</div>

<?php
    include 'include_files/footer.php';
?>