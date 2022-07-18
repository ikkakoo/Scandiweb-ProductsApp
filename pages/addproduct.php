<?php 
    include 'include_files/header.php';
    require_once '../helpers/system_helper.php';
?>

<?php
    $new_product = new Product;

    $sku = $name = $price = $size = $weight = $height = $width = $length = '';
    $sku_error = $name_error = $price_error = $size_error = $weight_error = $height_error = $width_error = $length_error = '';
    if (isset($_POST['submit'])) {
        // validate sku
        if (empty($_POST['sku'])) {
            $sku_error = 'SKU is required!';
        } elseif (strlen($_POST['sku']) < 8)  {
            $sku_error = 'SKU must be at least 8 chars';
        } else {
            $sku = filter_input(INPUT_POST, 'sku', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validate name
        if (empty($_POST['name'])) {
            $name_error = 'Name is required!';
        // } elseif (strlen($_POST['name']) < 5)  {
        //     $name_error = 'SKU must be at least 5 letters, (can not be numeric)';
        } else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        

        // validate price
        if (empty($_POST['price'])) {
            $price_error = 'Price is required!';
        } else {
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validate size
        if (empty($_POST['size'])) {
            $size_error = 'Size is required!';
        } else {
            $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validate weight
        if (empty($_POST['weight'])) {
            $weight_error = 'Weight is required!';
        } else {
            $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validate height
        if (empty($_POST['height'])) {
            $height_error = 'Height is required!';
        } else {
            $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validate width
        if (empty($_POST['width'])) {
            $width_error = 'Width is required!';
        } else {
            $width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validate price
        if (empty($_POST['length'])) {
            $length_error = 'Length is required!';
        } else {
            $length = filter_input(INPUT_POST, 'length', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if ((empty($sku_error) && empty($name_error) && empty($price_error)) && empty($size_error) || empty($weight_error) || (empty($height_error) && empty($width_error) && empty($length_error))) {
            // insert into db
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

<div class="container" id="#product_form">
    <form method="post" action="add-product.php" name="product_form">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" class="form-control <?php echo $sku_error ?  'is-invalid' : null;?>" name="sku" id="sku">
            <div class="invalid-feedback">
                <?php echo $sku_error; ?>
            </div>
        </div>
        
        <br>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control <?php echo $name_error ?  'is-invalid' : null;?>" name="name" id="name">
            <div class="invalid-feedback">
                <?php echo $name_error; ?>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Price ($)</label>
            <input type="text" class="form-control <?php echo $price_error ?  'is-invalid' : null;?>" name="price" id="price">
            <div class="invalid-feedback">
                <?php echo $price_error; ?>
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
            <div id="#weight" class="hidden">
                <input type="text" name="weight" class="form-control <?php echo $weight_error ?  'is-invalid' : null;?>" placeholder="Please Provide Weight in (kg)">
                <div class="invalid-feedback">
                    <?php echo $weight_error; ?>
                </div>
            </div>

            <div id="#size" class="hidden">
                <input type="text" name="size" class="form-control <?php echo $size_error ?  'is-invalid' : null;?>" placeholder="Please Provide Size in (mb)">
                <div class="invalid-feedback">
                    <?php echo $size_error; ?>
                </div>
            </div>

            <div id="furniture-inputs" class="hidden">
                <input type="text" class="form-control <?php echo $height_error ?  'is-invalid' : null;?> mb-1" name="height" id="#height" placeholder="Please Provide Height in (cm)">
                <div class="invalid-feedback">
                    <?php echo $height_error; ?>
                </div>
                <input type="text" class="form-control <?php echo $width_error ?  'is-invalid' : null;?> mb-1" name="width" id="#width" placeholder="Please Provide Width in (cm)">
                <div class="invalid-feedback">
                    <?php echo $width_error; ?>
                </div>
                <input type="text" class="form-control <?php echo $length_error ?  'is-invalid' : null;?>" name="length" id="#length" placeholder="Please Provide Length in (cm)">
                <div class="invalid-feedback">
                    <?php echo $length_error; ?>
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