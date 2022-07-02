<?php 
    include 'include_files/header.php';
?>

<?php foreach($products as $product): ?>
    <p><?php echo $product->sku ?></p>
<?php endforeach; ?>


<?php 
    include 'include_files/footer.php';
?>