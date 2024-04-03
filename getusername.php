<?php
// Establish database connection
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "pc_components";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming $uid contains the user_id value obtained from POST data
$uid = $_POST["uid"];

// Prepare and execute SQL query to retrieve username based on user_id
$sql = "SELECT username FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();

// Check if a row is returned
if ($result->num_rows > 0) {
    // Fetch username from the result
    $row = $result->fetch_assoc();
    $username = $row["username"];
    
    // Return success response with username
    $response = array("success" => true, "username" => $username);
    echo json_encode($response);
} else {
    // Return failure response if no user is found
    $response = array("success" => false);
    echo json_encode($response);
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
