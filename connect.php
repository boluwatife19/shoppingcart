<?php
$servername = 'localhost'; // Server name or IP address
$dbUsername = 'root'; // Database username
$dbPassword = ''; // Database password
$dbName = 'shopping_cart'; // Database name

try {
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName); // Create a new mysqli connection object
    if ($conn->connect_error) { // Check if the connection to the database has failed
        throw new Exception("Connection failed: " . $conn->connect_error); // Throw an exception with the error message
    }
} catch (Exception $e) { // Catch any exceptions thrown during the connection attempt
    die("Error: " . $e->getMessage()); // Display the error message and terminate the script execution
}
?>
