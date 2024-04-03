

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_components";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the generate button is clicked
if (isset($_POST['generate'])) {

    // Get the user's purpose and budget
    $purpose = $_POST['purpose'];
    $budget = intval($_POST['budget']);
    $uid = $_POST['uid'];
    // Define the range for checking components around the budget
    $lower_limit = $budget - 0;
    $upper_limit = $budget + 5000;

    // Prepare and execute a SQL query to fetch relevant data from the order_page table
    $sql = "SELECT DISTINCT invoice_num, componentName, productId 
            FROM order_page 
            WHERE category = '$purpose' AND price_inr BETWEEN $lower_limit AND $upper_limit
            ORDER BY invoice_num, ABS(price_inr - $budget) ASC";
    $result = mysqli_query($conn, $sql);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Initialize variables to track the current invoice number and total amount
        $current_invoice_num = null;
        $table_opened = false;
        $total_amount = 0;

        // Loop through each row
        while ($row = mysqli_fetch_assoc($result)) {
            $invoice_num = $row['invoice_num'];
            $componentName = $row['componentName'];
            $productId = $row['productId'];

            // If invoice number changes, start a new table
            if ($invoice_num !== $current_invoice_num) {
                if ($table_opened) {

                    // Display total amount for the previous table
                    echo "<tr><td ><strong>Total Amount:</strong></td><td>$total_amount</td></tr>";
                    echo "</table>";
                    echo "<button onclick='window.print()'>Print</button>";
        // Add edit icon button
        echo "<button id='edit' onclick='showContainer()'>Edit</button>";
                    // Add order button with onclick event to log invoice number
                    echo "<a href='orderforpcpal.html?inv=$current_invoice_num&uid=$uid'>Order</a>";
                }
                // Display invoice number as header
                echo "<h2>Invoice Number: $invoice_num</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Component Name</th><th>Price (INR)</th></tr>";
                $table_opened = true;
                $current_invoice_num = $invoice_num;
                $total_amount = 0; // Reset total amount for the new table
            }

            // Prepare and execute a SQL query to fetch component details
            $query = "SELECT name, price_inr FROM $componentName WHERE id = $productId";
            $result_detail = mysqli_query($conn, $query);
            $row_detail = mysqli_fetch_assoc($result_detail);

            $component_name = $row_detail['name'];
            $price_inr = $row_detail['price_inr'];
            $total_amount += $price_inr;

            // Display the fetched data in the table row
            echo "<tr><td>$component_name</td><td>$price_inr</td></tr>";
        }

        // Close the last table and display total amount
        if ($table_opened) {
            echo "<tr><td ><strong>Total Amount:</strong></td><td><strong>$total_amount</strong></td></tr>";
            echo "</table>";
            echo "<button onclick='window.print()'>Print</button>";
        // Add edit icon button
        echo "<button id='edit' onclick='showContainer()'>Edit</button>";
            echo "<a href='orderforpcpal.html?inv=$current_invoice_num&uid=$uid'>Order</a>";
        }
    } else {
        echo "No components found for the given purpose and budget.<br>";
        echo "<button id='edit' onclick='showContainer()'>Edit</button>";
    }
}
?>
