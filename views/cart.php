<?php include '../connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">

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

        <section class="display_product">

            <table>

                <thead>
                    <th>#</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php

                    $display_product = "select * from `cart`"; // SQL query to retrieve products from the cart table
                    $num = 0;
                    $result = mysqli_query($conn, $display_product); // Execute the SQL query

                    if (mysqli_num_rows($result) > 0) { // Check if there are any products in the cart

                        while ($row = mysqli_fetch_assoc($result)) { // Loop through each product in the cart
                            $num++;
                    ?>

                            <tr>
                                <td><?php echo $num ?></td>
                                <td><img src='../images/<?php echo $row['image'] ?>' alt="<?php echo $row['name'] ?>"></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="../interact/cartdelete.php?deleteid=<?php echo $row['id'] ?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to remove this product');"><i class="fas fa-trash"></i></a> <!-- Link/button to delete the product from the cart -->
                                </td>
                            </tr>

                    <?php
                        };
                    } else {
                        echo 'No Product Available';
                    }
                    ?>

                    <thead class="table-light">

                        <th>T<br />O<br />T<br />A <br />L</th>

                        <?php
                        $display_product = "select * from `cart`"; // SQL query to retrieve products from the cart table
                        $totalPrice = 0;
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
                        <th class="nit">
                            <p>$<?php echo $totalPrice ?></p> <!-- Display the total price -->
                        </th>
                    </thead>
                </tbody>
            </table>

            <a href="form.php" class="check">
                Check Out
            </a>
        </section>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>