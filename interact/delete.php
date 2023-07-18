<?php
include '../connect.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid']; // Get the product ID to delete from the URL parameter

    $sql = "delete from `products` where id = $id"; // SQL query to delete the product from the database
    $result = mysqli_query($conn, $sql); // Execute the SQL query

    if($result){
        header('location:../view_product.php'); // Redirect to the view_product.php page after successful deletion
    }else{
        die(mysqli_error($con)); // Display an error message if there is an error in the deletion query
    }
}
?>
