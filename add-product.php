<?php 
    // include init.php file
    require_once 'config/init.php';
?>

<?php
    // create Product objcet
    $product = new Product;

    // instantiate Template class to create first page products
    $template = new Template('pages/addproduct.php');

   
    
    $template->categories = $product->get_categories();

    echo $template;
?>