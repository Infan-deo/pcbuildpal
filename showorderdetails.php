<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_components";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user_id from the URL
$user_id = $_GET['uid'];

// Prepare and execute SQL query to fetch invoice_num from order_details table
$sql_order_details = "SELECT invoice_num FROM order_details WHERE user_id = '$user_id'";
$result_order_details = $conn->query($sql_order_details);

if ($result_order_details->num_rows > 0) {
    // Fetch the invoice_num
    $row_order_details = $result_order_details->fetch_assoc();
    $invoice_num = $row_order_details['invoice_num'];

    // Prepare and execute SQL query to fetch componentName, productId from order_page table
    $sql_order_page = "SELECT componentName, productId FROM order_page WHERE invoice_num = '$invoice_num'";
    $result_order_page = $conn->query($sql_order_page);

    if ($result_order_page->num_rows > 0) {
        echo "<head>";
        echo "<link rel=stylesheet href=yourdetails.css>";
        echo "</head>";
        echo "<h2><center>Your Details</center></h2>";
        echo "<table class='pc-table' border='1'>";
        echo "<tr><th>S.No</th><th>Component Name</th><th>Price (INR)</th></tr>";
        
        $total_amount = 0;
        $serial_number = 1;

        // Fetch componentName and productId
        while ($row_order_page = $result_order_page->fetch_assoc()) {
            $componentName = $row_order_page['componentName'];
            $productId = $row_order_page['productId'];

            // Prepare and execute SQL query to fetch name, price_inr from componentName table using productId
            $sql_componentName = "SELECT name, price_inr FROM $componentName WHERE id = '$productId'";
            $result_componentName = $conn->query($sql_componentName);

            if ($result_componentName->num_rows > 0) {
                $row_componentName = $result_componentName->fetch_assoc();
                $name = $row_componentName['name'];
                $price_inr = $row_componentName['price_inr'];
                
                // Calculate total amount
                $total_amount += $price_inr;
                
                // Display row with serial number, component name, and price
                echo "<tr>";
                echo "<td>$serial_number</td>";
                echo "<td>$name</td>";
                echo "<td>$price_inr</td>";
                echo "</tr>";
                
                // Increment serial number for the next row
                $serial_number++;
            }
        }
        
        // Display total amount row
        echo "<tr>";
        echo "<td colspan='2'><strong>Total Amount</strong></td>";
        echo "<td><strong>$total_amount</strong></td>";
        echo "</tr>";

        echo "</table>";
        
        // Add "Go Back" button
        echo "<div style='text-align: center; margin-top: 20px;'>";
        echo "<a href='select_page.html?uid=$user_id' class='back-button'>Go Back</a>";
        echo "</div>";
    } else {
        echo "No records found in order_page for invoice_num: $invoice_num";
    }
} else {
    echo "<span>You ordered nothing</span>";
    
    $uid = $_GET['uid'];

    // Check if the value of 'uid' is null
    if ($user_id === "null" || $uid === "") {
        // Redirect to Login1.html if 'uid' is null
        header("Location: Login1.html");
        exit(); // Stop further execution
    }
}

$conn->close();
?>
