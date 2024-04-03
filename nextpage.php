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

$combinedData = file_get_contents('php://input');
$dataArray = json_decode($combinedData, true);

// Now $dataArray contains both pieces of data as arrays
$mycomp = $dataArray[0];
$ids= $dataArray[1];

// Convert the list to JSON format

$totalAmount=0;
// Now $list contains your original list
echo"<head>";
echo "<link rel=stylesheet href=yourdetails.css>";
echo "</head>";
echo "<h2><center>Your Order</center></h2>";
echo "<table class='pc-table' border='1'>";
echo "<tr><th>No.</th><th>Component Name</th><th>Price (INR)</th></tr>";
for($i = 0; $i < count($mycomp); $i++) {
    // Fetch the second and last column's row in the given query
    $sql = "SELECT name,price_inr FROM $mycomp[$i] WHERE id = $ids[$i]";
	
    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result && $result->num_rows > 0) {
        // Output data of each row
       
        while ($row = $result->fetch_assoc()) {
	
    
    $counter = 1;
    $totalAmount += $row['price_inr'];
            echo "<tr><td>$counter</td><td>".$row['name']."</td><td>".$row['price_inr']."</td></tr>";
            $counter++;
            
        
        
        
    }
    } else {
        echo "0 results";
    }
    
}
echo "<tr><td colspan='2'><strong>Total Amount:</strong></td><td><strong>$totalAmount</strong></td></tr>";
    echo "</table>";

// Close the connection
$conn->close();
?>