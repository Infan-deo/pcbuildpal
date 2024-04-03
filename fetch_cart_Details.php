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


$mycomp_json = $_POST['mycomp'];
$ids_json = $_POST['ids'];

// Decode the JSON data
$mycomp = json_decode($mycomp_json, true);
$ids = json_decode($ids_json, true);

// Convert the list to JSON format

$total=[];
// Now $list contains your original list

for($i = 0; $i < count($mycomp); $i++) {
    // Fetch the second and last column's row in the given query
    $sql = "SELECT name,price_inr FROM $mycomp[$i] WHERE id = $ids[$i]";
	
    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result && $result->num_rows > 0) {
        // Output data of each row
	
        while ($row = $result->fetch_assoc()) {
	
	array_push($total,$row['price_inr']);
	$prod=ucfirst($mycomp[$i]);
         echo "<b> $prod:</b><br><div class=Cartlist > &nbsp; $row[name] &nbsp;  <b> Rs: </b> $row[price_inr]&nbsp;<button id=$mycomp[$i] onclick=removeprod(this) class=btn-remove>Remove</button></div><br>";
		    
    }
    } else {
        echo "0 results";
    }
}
$sum= array_sum($total);
if(!empty($mycomp)){
echo "";
echo "<br > <div class=total><b>Total:</b> $sum</div> ";
echo "<br><br><button id=orderbutt onclick=orderpage() class=btn-order>Go To Order Page</button>";
}
session_start();
$_SESSION['mycomp'] = $mycomp;
$_SESSION['ids'] = $ids;
$_SESSION['sum'] = $sum; 
// Close the connection
$conn->close();
?>
