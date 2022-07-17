<?php 
    include 'include_files/header.php';
    require_once '../helpers/system_helper.php';
?>

<?php
    $new_product = new Product;

    $sku = $name = $price = $size = $weight = $height = $width = $length = '';
    $sku_error = $name_error = $price_error = $size_error = $weight_error = $height_error = $width_error = $length_error = '';
    if (isset($_POST['submit'])) {
        // validat sku
        if (empty($_POST['sku'])) {
            $sku_error = 'SKU is required!';
        } else {
            $sku = filter_input(INPUT_POST, 'sku', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validat name
        if (empty($_POST['name'])) {
            $name_error = 'Name is required!';
        } else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validat price
        if (empty($_POST['price'])) {
            $price_error = 'Price is required!';
        } else {
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validat size
        if (empty($_POST['size'])) {
            $size_error = 'Size is required!';
        } else {
            $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validat weight
        if (empty($_POST['weight'])) {
            $weight_error = 'Weight is required!';
        } else {
            $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validat height
        if (empty($_POST['height'])) {
            $height_error = 'Height is required!';
        } else {
            $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validat width
        if (empty($_POST['width'])) {
            $width_error = 'Width is required!';
        } else {
            $width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validat price
        if (empty($_POST['length'])) {
            $length_error = 'Length is required!';
        } else {
            $length = filter_input(INPUT_POST, 'length', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if ($sku_error == '') {
            // insert into db
            $product_data = [];
            $product_data['sku'] = $_POST['sku'];
            $product_data['name'] = $_POST['name'];
            $product_data['type'] = $_POST['type'];
            $product_data['price'] = $_POST['price'];
            if ($product_data['type'] === 'Furniture') {
                $product_data['attribute'] = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'];
            } else {
                $product_data['attribute'] = $_POST['attribute'];
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

<div class="container">
    <form method="post" action="add-product.php" id="product_form" name="product_form">
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
                <input type="text" class="form-control <?php echo $weight_error ?  'is-invalid' : null;?>" name="attribute" id="weight" placeholder="Please Provide Weight in (kg)">
                <div class="invalid-feedback">
                    <?php echo $weight_error; ?>
                </div>
            <?php elseif ($type == 'DVD'): ?>
                <label>Size (mb)</label>
                <input type="text" class="form-control <?php echo $size_error ?  'is-invalid' : null;?>" name="attribute" id="size" placeholder="Please Provide Size in (mb)">
                <div class="invalid-feedback">
                    <?php echo $size_error; ?>
                </div>
            <?php elseif($type == 'Furniture'): ?>
                <label>Height (cm)</label>
                <input type="text" class="form-control <?php echo $height_error ?  'is-invalid' : null;?>" name="height" id="height" placeholder="Please Provide Height in (cm)">
                <div class="invalid-feedback">
                    <?php echo $height_error; ?>
                </div>
                <label>Width (cm)</label>
                <input type="text" class="form-control <?php echo $width_error ?  'is-invalid' : null;?>" name="width" id="width" placeholder="Please Provide Width in (cm)"> 
                <div class="invalid-feedback">
                    <?php echo $width_error; ?>
                </div>
                <label>Length (cm)</label>
                <input type="text" class="form-control <?php echo $length_error ?  'is-invalid' : null;?>" name="length" id="length" placeholder="Please Provide Length in (cm)">
                <div class="invalid-feedback">
                    <?php echo $length_error; ?>
                </div>
            <?php endif; ?>    
        </div>
        <br>
        <input type="submit" name="submit" class="btn btn-secondary" value="Save" id="submit-product-form">
    </form>
</div>

<?php
    include 'include_files/footer.php';
?>