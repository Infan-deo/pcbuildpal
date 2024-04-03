<!-- signup.php -->
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database connection
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "pc_components";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    function generateRandomUserId($length) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $userId = 'uid';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length - 3; $i++) {
            $userId .= $characters[rand(0, $charactersLength - 1)];
        }
        return $userId;
    }
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $randomUserId = generateRandomUserId(8);
    // SQL query to insert user data into the 'users' table
    $sql = "INSERT INTO users (user_id,username, email, password) VALUES ('$randomUserId','$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["username"] = $username;
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
    
        // If a matching user is found, set the success flag to true
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { // Store username in session for future use
        header("Location: select_page.html?uid=".$row['user_id']); // Redirect to the next page after successful signup
        exit();
            }
    
        }
    }
         else {
        echo "<div class='container'><p>Signup failed. Error: " . $conn->error . "</p></div>";
    }

    $conn->close();
}
?>
