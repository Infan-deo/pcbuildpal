
<?php
// Replace these with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_components";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
$pdo = new PDO('mysql:host=localhost;dbname=pc_components', 'root', '');
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['tableName'])){
    $buttonName = $_POST['tableName'];
}
$brandCondition = "";
$socketTypeCondition = "";
$cat3Condition = "";
$cat4Condition = "";
$tableName = $buttonName;
$statement = $pdo->prepare("DESCRIBE $tableName");
$statement->execute();

// Fetch column names
$columns = $statement->fetchAll(PDO::FETCH_COLUMN);

// Store column names in an array
$columnNames = [];
foreach ($columns as $column) {
    $columnNames[] = $column;
}

// Define xwant array
$xwant = ['id', 'name', 'price_inr'];

// Remove elements from $columnNames that are present in xwant
$columnNames = array_diff($columnNames, $xwant);

if($tableName != "processors"&& $tableName != "ram" && $tableName != "motherboards" && $tableName != "graphics_cards"){
// Prepare and execute SQL query to fetch column names from a table


// Prepare SQL query to fetch selected columns
$selectedColumns = implode(', ', $columnNames);
$sql = "SELECT DISTINCT $selectedColumns FROM $tableName";
$column1=$columnNames[2];
$column2=$columnNames[3];
$result = $conn->query($sql);

$brands = array();
$socketTypes = array();

if ($result->num_rows > 0) {
    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        // Add brand to the brands array
        if (!in_array($row[$column1], $brands)) {
            $brands[] = $row[$column1];
        }
        
        // Add socket type to the socketTypes array
        if (!in_array($row[$column2], $socketTypes)) {
            $socketTypes[] = $row[$column2];
        }
    }
}

echo "<label >$column1: </label>";
echo "<select id='brand'>";

echo "<option value=''>All</option>";
foreach ($brands as $brand) {
echo "<option value='$brand'>$brand</option>";
}
echo "</select>  ";
echo "<label >$column2: </label>";
echo "<select id='socketType'>
<option value=''>All</option>";
foreach ($socketTypes  as $socketType) {
echo "<option value='$socketType'>$socketType</option>";
}
echo "</select>";

echo "<button onclick='updatedsort()'>Apply</button>";



if(isset($_POST['buttonName'])){
    $buttonName = $_POST['buttonName'];
}
if(isset($_POST['brand']) && $_POST['brand'] != '') {
    $brandCondition = "WHERE $column1 = '".$_POST['brand']."'";
}

// Check if "All" option is selected for socket type
if(isset($_POST['socketType']) && $_POST['socketType'] != '') {
    if(!empty($brandCondition)){
        $socketTypeCondition = " AND $column2 = '".$_POST['socketType']."'";
    } else {
        $socketTypeCondition = "WHERE $column2 = '".$_POST['socketType']."'";
    }
}
$condition = "";
if (!empty($brandCondition) || !empty($socketTypeCondition)) {
    $condition = $brandCondition . " " . $socketTypeCondition;
}
$sql = "SELECT * FROM $tableName $condition";
$result = $conn->query($sql);

// Check if the query was successful
if($result->num_rows > 0) {
    echo "<table>";
   
    
    $serialNumber = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td id=sno>" . $serialNumber . "</td>";
        echo "<td class=product>" . $row['name'] . "</td>";
        echo "<td><b>Rs:" . $row['price_inr'] . "</b></td>";
        echo "<td id=add><button id='" . $row['id'] . "' onclick='addProduct(this)' class=btn-add >ADD</button></td>";
        echo "</tr>";
        $serialNumber++;
    }
    
    echo "</table>";
} else {
    echo "<br><b><center>0 results</center></b>";
}
}
else {
    $selectedColumns = implode(', ', $columnNames);
$sql = "SELECT DISTINCT $selectedColumns FROM $tableName";
$column1=$columnNames[2];
$column2=$columnNames[3];
$column3=$columnNames[4];
$column4=$columnNames[5];

$result = $conn->query($sql);

$brands = array();
$socketTypes = array();
$category3 = array();
$category4 = array();


if ($result->num_rows > 0) {
    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        // Add brand to the brands array
        if (!in_array($row[$column1], $brands)) {
            $brands[] = $row[$column1];
        }
        
        // Add socket type to the socketTypes array
        if (!in_array($row[$column2], $socketTypes)) {
            $socketTypes[] = $row[$column2];
        }
        if (!in_array($row[$column3], $category3)) {
            $category3[] = $row[$column3];
        }
        
        // Add socket type to the socketTypes array
        if (!in_array($row[$column4], $category4)) {
            $category4[] = $row[$column4];
        }
    }
}

echo "<label >$column1: </label>";
echo "<select id='brand'>";

echo "<option value=''>All</option>";
foreach ($brands as $brand) {
echo "<option value='$brand'>$brand</option>";
}
echo "</select>  ";

echo "<label >$column2: </label>";
echo "<select id='socketType'>
<option value=''>All</option>";
foreach ($socketTypes  as $socketType) {
echo "<option value='$socketType'>$socketType</option>";
}
echo "</select>";

echo "<label >$column3: </label>";
echo "<select id='cate3'>";

echo "<option value=''>All</option>";
foreach ($category3 as $cat3) {
echo "<option value='$cat3'>$cat3</option>";
}
echo "</select>  ";
echo "<label >$column4: </label>";
echo "<select id='cate4'>";
echo "<option value=''>All</option>";
foreach ($category4 as $cat4) {
echo "<option value='$cat4'>$cat4</option>";
}
echo "</select>  ";

echo "<button onclick='updatedsort()'>Apply</button>";



if(isset($_POST['buttonName'])){
    $buttonName = $_POST['buttonName'];
}
if(isset($_POST['brand']) && $_POST['brand'] != '') {
    $brandCondition = "WHERE $column1 = '".$_POST['brand']."'";
}

// Check if "All" option is selected for socket type
if(isset($_POST['socketType']) && $_POST['socketType'] != '') {
    if(!empty($brandCondition)){
        $socketTypeCondition = " AND $column2 = '".$_POST['socketType']."'";
    } else {
        $socketTypeCondition = "WHERE $column2 = '".$_POST['socketType']."'";
    }
}
// Check if "All" option is selected for socket type
if(isset($_POST['cate3']) && $_POST['cate3'] != '') {
    if(!empty($brandCondition) || !empty($socketTypeCondition)){
        $cat3Condition = " AND $column3 = '".$_POST['cate3']."'";
    } else {
        $cat3Condition = "WHERE $column3 = '".$_POST['cate3']."'";
    }
}

if(isset($_POST['cate4']) && $_POST['cate4'] != '') {
    if(!empty($brandCondition) || !empty($socketTypeCondition) || !empty($cat3Condition)){
        $cat4Condition = " AND $column4 = '".$_POST['cate4']."'";
    } else {
        $cat4Condition = "WHERE $column4 = '".$_POST['cate4']."'";
    }
}
$condition = "";
if (!empty($brandCondition) || !empty($socketTypeCondition)|| !empty($cat3Condition)|| !empty($cat4Condition)) {
    $condition = $brandCondition . " " . $socketTypeCondition . " " . $cat3Condition . " " . $cat4Condition;
}
$sql = "SELECT * FROM $tableName $condition";
$result = $conn->query($sql);

// Check if the query was successful
if($result->num_rows > 0) {
    echo "<table>";
   
    
    $serialNumber = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td id=sno>" . $serialNumber . "</td>";
        echo "<td class=product>" . $row['name'] . "</td>";
        echo "<td><b>Rs:" . $row['price_inr'] . "</b></td>";
        echo "<td id=add><button id='" . $row['id'] . "' onclick='addProduct(this)' class=btn-add >ADD</button></td>";
        echo "</tr>";
        $serialNumber++;
    }
    
    echo "</table>";
} else {
    echo "<br><b><center>0 results</center></b>";
}
}

// Close the connection
$conn->close();
?>

