<?php
include('../connect.php'); // Include the file to establish a database connection

$id = $_GET['addcart']; // Get the product ID from the URL parameter
$sql = "select * from `products` where id = $id"; // SQL query to retrieve the product information based on the ID
$result = mysqli_query($conn, $sql); // Execute the SQL query
$row = mysqli_fetch_assoc($result); // Fetch the result as an associative array

$product_name = $row['name']; // Get the product name from the fetched row
$product_price = $row['price']; // Get the product price from the fetched row
$product_image = $row['image']; // Get the product image from the fetched row

$insert_query = "insert into `cart` (name, price, image) values ('$product_name','$product_price','$product_image') "; // SQL query to insert the product into the cart table
$result =  mysqli_query($conn, $insert_query); // Execute the SQL query

if ($result) {
    header('location:cart.php'); // Redirect to the cart page if the insertion is successful
} else {
    die(mysqli_error($conn)); // Display an error message if there is an error in the insertion query
}
