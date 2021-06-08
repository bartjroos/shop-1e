<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    
    <div class="wrapper">
        <h1>Producten</h1>

        <div class="products">
            <?php foreach($producten as $product): ?>
                <div class="product">
                    <h2><?php echo $product['name']; ?></h2>
                    <p>Prijs: &euro;<?php echo $product['price']; ?></p>
                    <a href="/buy/<?php echo $product['id']; ?>">Kopen</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>