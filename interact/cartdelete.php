<?php
include '../connect.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid']; // Get the cart item ID to delete from the URL parameter

    $sql = "delete from `cart` where id = $id"; // SQL query to delete the cart item from the database
    $result = mysqli_query($conn, $sql); // Execute the SQL query

    if($result){
        header('location:../views/cart.php'); // Redirect to the cart.php page after successful deletion
    }else{
        die(mysqli_error($con)); // Display an error message if there is an error in the deletion query
    }
}
?>
