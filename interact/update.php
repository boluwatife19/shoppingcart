<?php
include('../connect.php'); // Include the file to establish a database connection

$id = $_GET['updateid']; // Get the product ID from the URL parameter
$sql = "select * from `products` where id = $id"; // SQL query to retrieve the product information based on the ID
$result = mysqli_query($conn, $sql); // Execute the SQL query
$row = mysqli_fetch_assoc($result); // Fetch the result as an associative array

$product_name = $row['name']; // Get the product name from the fetched row
$product_price = $row['price']; // Get the product price from the fetched row
$product_image = $row['image']; // Get the product image from the fetched row

if (isset($_POST['update'])) { // Check if the update button is clicked
    $product_name = $_POST['product_name']; // Get the updated product name from the form
    $product_price = $_POST['product_price']; // Get the updated product price from the form
    $product_image = $_FILES['product_image']['name']; // Get the updated product image name from the form
    $product_image_tmp_name = $_FILES['product_image']['tmp_name']; // Get the temporary location of the updated product image
    $product_image_folder = '../images/' . $product_image; // Define the folder where the updated product image will be stored

    $insert_query = "update `products` set id=$id, name='$product_name', image='$product_image' where id=$id"; // SQL query to update the product information in the products table
    $result =  mysqli_query($conn, $insert_query); // Execute the SQL query

    if ($result) {
        header('location:../view_product.php'); // Redirect to the view_product.php page if the update is successful
        move_uploaded_file($product_image_tmp_name, $product_image_folder); // Move the updated product image to the designated folder
        $display_message = "Product Updated successfully"; // Display a success message
    } else {
        die(mysqli_error($conn)); // Display an error message if there is an error in the update query
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/d2314fe5d0.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('../header.php') ?>
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
                <input type="text" placeholder="Enter Product Name" class="input_fields" required name="product_name" value=<?php echo $product_name ?>>
                <input type="number" min="1" placeholder="Enter Product Price" class="input_fields" required name="product_price" value=<?php echo $product_price ?>>
                <input type="file" required name="product_image" class="input_fields" accept="image/png, image/jpg, image/jpeg" value=<?php echo $product_image ?>>
                <input type="submit" value="Add Product" name="update" class="submit_btn">
            </form>
        </section>
    </div>
    <script src="/js/script.js"></script>
</body>

</html>