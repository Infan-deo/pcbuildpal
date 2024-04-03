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

// Fetching order details for the given user_id
$stmt = $conn->prepare("SELECT * FROM order_details WHERE user_id = ?");
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $order_details[] = $row;
    }
} else {
    $order_details = [];
}

// Close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="showuserdel.css">

</head>
<body>
    <center><h1>Order Details</h1></center>
        <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Country</th>
            <th>Address</th>
            <th>Pincode</th>
            <th>Phone Number</th>
            <th>Alternate Phone Number</th>
            <th>Payment Method</th>
            <?php if (!empty($order_details[0]['card_num'])): ?>
                <th>Card Number</th>
            <?php endif; ?>
            <?php if (!empty($order_details[0]['expiry_date'])): ?>
                <th>Expiry Date</th>
            <?php endif; ?>
            <?php if (!empty($order_details[0]['cvv'])): ?>
                <th>CVV</th>
            <?php endif; ?>
            <?php if (!empty($order_details[0]['upi_id'])): ?>
                <th>UPI ID</th>
            <?php endif; ?>
            <th>Action</th>
        </tr>
        <?php foreach ($order_details as $order): ?>
        <tr>
            <td><?php echo $order['full_name']; ?></td>
            <td><?php echo $order['Country']; ?></td>
            <td><?php echo $order['Address']; ?></td>
            <td><?php echo $order['Pincode']; ?></td>
            <td><?php echo $order['Phone_num']; ?></td>
            <td><?php echo $order['Alt_ph_num']; ?></td>
            <td><?php echo $order['payment_method']; ?></td>
            <?php if (!empty($order['card_num'])): ?>
                <td><?php echo $order['card_num']; ?></td>
            <?php endif; ?>
            <?php if (!empty($order['expiry_date'])): ?>
                <td><?php echo $order['expiry_date']; ?></td>
            <?php endif; ?>
            <?php if (!empty($order['cvv'])): ?>
                <td><?php echo $order['cvv']; ?></td>
            <?php endif; ?>
            <?php if (!empty($order['upi_id'])): ?>
                <td><?php echo $order['upi_id']; ?></td>
            <?php endif; ?>
            <td><a href="edit_order.php?uid=<?php echo $uid; ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
     <!-- Add a button to go back to select_page.html with uid included -->
     <div style="text-align: center; margin-top: 20px;">
        <a href="select_page.html?uid=<?php echo $uid; ?>" class="back-button">Go Back</a>
    </div>
</body>
</html>
