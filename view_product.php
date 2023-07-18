<!-- Connection to the database -->
<?php include 'connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- font awesome cdn script -->
    <script src="https://kit.fontawesome.com/d2314fe5d0.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Including the header's section instead of writing for each page -->
    <?php include 'header.php' ?>

    <div class="container">
        <section class="display_product">
            <table>
                <thead>
                    <th>#</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php
                    // selecting all rows from the table "products"
                    $display_product = "select * from `products`";
                    $num = 0;

                    //this object connects the selction to the database
                    $result = mysqli_query($conn, $display_product);

                    //this condition means if the $display_product rows is more than 0; then the following condition should happen
                    if (mysqli_num_rows($result) > 0) {

                        //this is going to loop through all the rows till it iterates through all
                        while ($row = mysqli_fetch_assoc($result)) {
                            $num++;
                    ?>

                            <!-- Start of a table row -->
                            <tr>
                                <td><?php echo $num ?></td> <!-- Displaying the number -->
                                <td><img src='images/<?php echo $row['image'] ?>' alt="<?php echo $row['name'] ?>"></td> <!-- Displaying an image -->
                                <td><?php echo $row['name'] ?></td> <!-- Displaying the product name -->
                                <td><?php echo $row['price'] ?></td> <!-- Displaying the product price -->
                                <td>
                                    <a href="./interact/delete.php?deleteid=<?php echo $row['id'] ?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product');">
                                        x<i class="fas fa-trash"></i></a> <!-- Link/button for deleting the product -->
                                    <a href="./interact/update.php?updateid=<?php echo $row['id'] ?>" class="updatemp_product_btn">+<i class="fas fa-edit"></i></a> <!-- Link/button for updating the product -->
                                </td>
                            </tr>
                            <!-- End of the table row -->


                    <?php
                        };
                    } else {
                        echo 'No Poduct Available'; // Message displayed if no products are available

                    } ?>

                </tbody>
            </table>
        </section>
    </div>
</body>

</html>