<?php 
    // include init.php file
    require_once 'config/init.php';
?>

<?php
    // create Product objcet
    $product = new Product;

    // mass delete
    if (isset($_POST['delete'])) {
        $extracted_sku = implode(',', $_POST['delete']);
        echo $extracted_sku;

        // if ($product->delete($delete_skus)) {
        //     redirect('index.php', 'Products Deleted', 'success');
        // } else {
        //     redirect('index.php', 'Something Went Wrong, Products Not Deleted', 'error');
        // }
    }

    // instantiate Template class to create first page products
    $template = new Template('pages/products.php');

    $category = isset($_GET['category']) ? $_GET['category'] : null;

    if ($category) {
        $template->products = $product->get_by_category($category);
    } else {
        $template->products = $product->get_all_products();
    }

    
    $template->categories = $product->get_categories();

    echo $template;
?>