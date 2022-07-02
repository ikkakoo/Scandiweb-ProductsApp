<?php 
    // include init.php file
    require_once 'config/init.php';
?>

<?php
    // create Product objcet
    $product = new Product;

    // instantiate Template class to create first page products
    $template = new Template('pages/products.php');

    $template->products = $product->get_all_products();
    
    echo $template;
?>