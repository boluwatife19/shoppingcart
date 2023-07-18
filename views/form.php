<?php include '../connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>

    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d2314fe5d0.js" crossorigin="anonymous"></script>
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

        <?php

        $display_product = "select * from `cart`"; // SQL query to retrieve products from the cart table
        $num = 0;
        $totalPrice = 0; // Variable to store the total price
        $price = 0;
        $result = mysqli_query($conn, $display_product); // Execute the SQL query

        if (mysqli_num_rows($result) > 0) { // Check if there are any products in the cart
            while ($row = mysqli_fetch_assoc($result)) { // Loop through each product in the cart
                $Price = 0;

                $price = $row['price']; // Get the price of the current product
                $totalPrice += $price; // Add the price to the total price
            }
        }
        ?>

        <form method="post" action="../interact/send.php">
            <div class="mb-3">
                <label class="form-label">Enter Your Full Name</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Your Email Address</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Total Payment</label>
                <fieldset disabled>
                    <input name="price" type="text" id="disabledTextInput" class="form-control" value="$<?php echo $totalPrice ?>">
                </fieldset>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div id="emailHelp" class="form-text">We'll never share your Info with anyone else.</div>
            <button type="submit" name="send" class="btn btn-primary">Submit</button>
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>

</html>