<?php
include('../connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping List</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
</head>

<body>
    <header class="header">
        <div class="header_body">
            <a href="index.php" class="logo">DEVTIFE</a>
            <nav class="navbar">
                <a href="../index.php">Add Products</a>
                <a href="../view_product.php">View Products</a>
                <a href="./views/shopit.php">Shopit</a>
            </nav>
            <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup>4</sup></span></a>
        </div>
    </header>
    <div class="container">

    <div class="grid">
    <?php
    $display_product = "select * from `products`"; // SQL query to retrieve all products
    $num = 0;
    $result = mysqli_query($conn, $display_product); // Execute the SQL query

    if (mysqli_num_rows($result) > 0) { // Check if there are any products returned from the query

        while ($row = mysqli_fetch_assoc($result)) { // Loop through each product
    ?>

            <article>
                <div class="top">
                    <div class="imgg"><img src='../images/<?php echo $row['image'] ?>' alt="<?php echo $row['name'] ?>"></div> <!-- Display product image -->
                </div>
                <div class="btns">
                    <div class="namme"><?php echo $row['name'] ?></div> <!-- Display product name -->

                    <a href="./addcart.php?addcart=<?php echo $row['id'] ?>" class="updatemp_product_btn">Add To Cart<i class="fas fa-edit"></i></a> <!-- Link/button to add product to cart -->
                    <div class="namme"><?php echo $row['price'] ?></div> <!-- Display product price -->
                </div>
            </article>

    <?php
        };
    } else {
        echo 'No Poduct Available'; // Message displayed if no products are available
    }
    ?>
</div>
</div>
</body>

</html>