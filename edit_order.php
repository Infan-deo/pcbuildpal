<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_components";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$uid = $_GET["uid"];
if ($uid == "null") {
    header("Location: Login1.html");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated values from the form
    $full_name = $_POST['full_name'];
    $country = $_POST['Country'];
    $address = $_POST['Address'];
    $pincode = $_POST['Pincode'];
    $phone_num = $_POST['Phone_num'];
    $alt_ph_num = $_POST['Alt_ph_num'];
    $payment_method = $_POST['payment_method'];
    $card_num = $_POST['card_num'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $upi_id = $_POST['upi_id'];

    // Prepare an SQL statement for updating order details
    $sql = "UPDATE order_details 
            SET full_name = '$full_name', 
                Country = '$country', 
                Address = '$address', 
                Pincode = '$pincode', 
                Phone_num = '$phone_num', 
                Alt_ph_num = '$alt_ph_num', 
                payment_method = '$payment_method', 
                card_num = '$card_num', 
                expiry_date = '$expiry_date', 
                cvv = '$cvv', 
                upi_id = '$upi_id' 
            WHERE user_id = '$uid'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a PHP success page after successful update
        echo "SQL Query: " . $sql;
        header("Location: success_page.php?uid=$uid");
        exit;
    } else {
        echo "Error updating order details: " . $conn->error;
        echo "SQL Query: " . $sql; // Debugging statement to check the SQL query
    }
}

// Fetch order details for the given user_id
$sql = "SELECT * FROM order_details WHERE user_id = '$uid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $order = mysqli_fetch_assoc($result);
} else {
    echo "Order not found.";
    exit;
}

// Close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="edit_order.css">

</head>
<body>
    <h1>Edit Order</h1>
    <form method="post" action="edit_order.php?uid=<?php echo $uid?>">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" value="<?php echo $order['full_name']; ?>"><br>
        
        <label for="Country">Country:</label><br>
        <input type="text" id="Country" name="Country" value="<?php echo $order['Country']; ?>"><br>
        
        <label for="Address">Address:</label><br>
        <input type="text" id="Address" name="Address" value="<?php echo $order['Address']; ?>"><br>
        
        <label for="Pincode">Pincode:</label><br>
        <input type="text" id="Pincode" name="Pincode" value="<?php echo $order['Pincode']; ?>"><br>
        
        <label for="Phone_num">Phone Number:</label><br>
        <input type="text" id="Phone_num" name="Phone_num" value="<?php echo $order['Phone_num']; ?>"><br>
        
        <label for="Alt_ph_num">Alternate Phone Number:</label><br>
        <input type="text" id="Alt_ph_num" name="Alt_ph_num" value="<?php echo $order['Alt_ph_num']; ?>"><br>
        
        <label for="payment_method">Payment Method:</label><br>
        <input type="text" id="payment_method" name="payment_method" value="<?php echo $order['payment_method']; ?>"><br>
        
        <label for="card_num">Card Number:</label><br>
        <input type="text" id="card_num" name="card_num" value="<?php echo $order['card_num']; ?>"><br>
        
        <label for="expiry_date">Expiry Date:</label><br>
        <input type="text" id="expiry_date" name="expiry_date" value="<?php echo $order['expiry_date']; ?>"><br>
        
        <label for="cvv">CVV:</label><br>
        <input type="text" id="cvv" name="cvv" value="<?php echo $order['cvv']; ?>"><br>
        
        <label for="upi_id">UPI ID:</label><br>
        <input type="text" id="upi_id" name="upi_id" value="<?php echo $order['upi_id']; ?>"><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
