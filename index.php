<?php 
    // include init.php file
    require_once 'config/init.php';
?>

<?php
    // create Product objcet
    $product = new Product;

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