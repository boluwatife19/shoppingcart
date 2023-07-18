<?php
include('connect.php');
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'images/' . $product_image;

    $insert_query = "insert into `products` (name, price, image) values ('$product_name','$product_price','$product_image')";
    $result =  mysqli_query($conn, $insert_query);
    if ($result) {
        move_uploaded_file($product_image_tmp_name, $product_image_folder);
        $display_message = "Product inserted successfully";
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/d2314fe5d0.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('header.php') ?>
    <div class="container">
        <?php
        if (isset($display_message)) {
            echo "<div class='display_message'>
                <span>$display_message</span>
                <i class='fas fa-times' onclick='this.parentElement.style.display = `none`'>s</i>
            </div>";
        }
        ?>
        <section>
            <h3 class="heading">Add Product</h3>
            <form action="" method="post" class="add_product" enctype="multipart/form-data">
                <input type="text" placeholder="Enter Product Name" class="input_fields" required name="product_name">
                <input type="number" min="1" placeholder="Enter Product Price" class="input_fields" required name="product_price">
                <input type="file" required name="product_image" class="input_fields" accept="image/png, image/jpg, image/jpeg">
                <input type="submit" value="Add Product" name="add_product" class="submit_btn">
            </form>
        </section>
    </div>
    <script src="/js/script.js"></script>
</body>

</html>