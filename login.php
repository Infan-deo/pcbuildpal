<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "pc_components";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if the provided username and password match a user in the database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // If a matching user is found, set the success flag to true
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $_SESSION["username"] = $username; // Store username in session for future use
        $response = array("success" => true,"username" => $username,"uid" => $row['user_id']);
        }
    } else {
        // If no matching user is found, set the success flag to false and return an error message
        $response = array("success" => false, "message" => "Invalid username or password.");
    }

    // Return the response as JSON
    echo json_encode($response);

    
    $conn->close();
}
?>
