<?php 
    // include init.php file
    require_once 'config/init.php';
?>

<?php

    // create Product objcet
    $product = new Product;

    if (isset($_POST['submit'])) {
        $product_data = [];
        $product_data['sku'] = $_POST['sku'];
        $product_data['name'] = $_POST['name'];
        $product_data['type'] = $_POST['type'];
        $product_data['price'] = $_POST['price'];
        $product_data['attribute'] = $_POST['attribute'];

        if ($product->add_product($product_data)) {
            redirect('index.php', 'Your Product Has Been Added', 'success');
        } else {
            redirect('index.php', 'Something Went Wrong', 'error');
        }
    }

    // instantiate Template class to create first page products
    $template = new Template('pages/addproduct.php');

   
    
    $template->categories = $product->get_categories();

    echo $template;
?>