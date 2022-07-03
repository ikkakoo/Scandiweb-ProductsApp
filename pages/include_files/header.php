<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_TITLE; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <nav class="navbar bg-light p-2">
        <div class="container-fluid ">
            <span class="navbar-brand mb-0 h1">
                <?php if(explode('/',$_SERVER['PHP_SELF'])[count(explode('/',$_SERVER['PHP_SELF'])) - 1] == 'index.php'): ?>
                    <?php echo PRODUCTS; ?>
                <?php else: ?>
                    <?php echo ADD_PRODUCT; ?>    
                <?php endif; ?>
            </span>
            <?php if(explode('/',$_SERVER['PHP_SELF'])[count(explode('/',$_SERVER['PHP_SELF'])) - 1] == 'index.php'): ?>
                <div class="d-flex gap-5">
                    <a href="add-product.php" class="btn btn-primary">Add</a>
                    <button type="button" class="btn btn-danger" id="delete-product-btn">Mass Delete</button>
                </div>
            <?php else : ?>
                <div class="d-flex gap-5">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            <?php endif; ?>        
        </div>
    </nav>
    
