<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "pc_components"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert data into order_details table
$order_id= generateorderNumber(7);
$user_id = $_POST['user_id'];
session_start();
$invoice_num = $_SESSION['invoice_num'];// You need to define this function to generate a unique invoice number
$full_name = $_POST['full_name'];
$country = $_POST['country'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$phone_num = $_POST['phone'];
$alt_ph_num = $_POST['alternate_phone'];
$payment_method = $_POST['payment_method'];
$card_num = $_POST['card_number'];
 $expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : "";
 $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : "";
 $upi_id = isset($_POST['upi_id']) ? $_POST['upi_id'] : "";

// Construct the SQL query
$sql = "INSERT INTO order_details (order_id,user_id, invoice_num, full_name, Country, Address, Pincode, Phone_num, Alt_ph_num,payment_method,card_num,expiry_date,cvv,upi_id) VALUES ('$order_id','$user_id', '$invoice_num', '$full_name', '$country', '$address', '$pincode', '$phone_num', '$alt_ph_num' ,'$payment_method','$card_num','$expiry_date',' $cvv','$upi_id')";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    header("Location: order_sucessful.html?uid=$user_id");
exit; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Function to generate a unique invoice number
function generateorderNumber($length) {
    // Your implementation to generate a unique invoice number
    $characters = '0123456789';
    $userId = '#';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length - 2; $i++) {
        $userId .= $characters[rand(0, $charactersLength - 1)];
    }
    return $userId;
}
?>
