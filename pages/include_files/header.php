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
                    <a href="index.php"><?php echo PRODUCTS; ?></a>
                <?php else: ?>
                    <span href="index.php" style="font-weight: bold;"><?php echo ADD_PRODUCT; ?>  </span>  
                <?php endif; ?>
            </span>
            <?php if(explode('/',$_SERVER['PHP_SELF'])[count(explode('/',$_SERVER['PHP_SELF'])) - 1] == 'index.php'): ?>
                <div class="d-flex gap-5">
                    <a href="add-product.php" class="btn btn-primary">ADD</a>
                    <form action="index.php" method="post">
                        <input type="button" class="btn btn-danger" id="delete-product-btn" name="delete-product-btn" value="MASS DELETE">
                        
                    </form>
                    <div class="d-flex gap-1 align-items-center">
                        <input type="checkbox" name="select-all" id="select-all" style="width: 2em;">
                        <label for="select-all" class="form-check-label">Toggle All</label>
                    </div>
                    
                </div>
            <?php else : ?>
                <div class="d-flex gap-5">
                    <a href="index.php" class="btn btn-danger" style="cursor: pointer; font-weight: bold">Cancel</a>
                </div>
            <?php endif; ?>        
        </div>
    </nav>
    <?php display_message(); ?>
    
