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
function generateRandominvoiceId($length) {
    $characters = '0123456789';
    $userId = 'INV';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length - 3; $i++) {
        $userId .= $characters[rand(0, $charactersLength - 1)];
    }
    return $userId;
}
if(isset($_POST['selectedcat'])){
$selectedcat =$_POST['selectedcat'];

}
if(isset($_POST['uid'])){
    $uid =$_POST['uid'];
    
    }
session_start();
$mycomp=$_SESSION['mycomp'];
$ids = $_SESSION['ids'];
$sum= $_SESSION['sum'];
$listc = count($mycomp);
$currentDate=date("Y-m-d");
$invoiceNum = generateRandominvoiceId(10);
echo "$invoiceNum";
$_SESSION['invoice_num'] = $invoiceNum;
for($i=0;$i<$listc;$i++)
{


$sql="INSERT INTO order_page(user_id,invoice_num,componentName, productId, order_date, category, price_inr) VALUES('$uid','$invoiceNum','$mycomp[$i]',$ids[$i],'$currentDate','$selectedcat',$sum)";
if($conn->query($sql) === TRUE)
{
echo "Record inserted";
}
else
{
echo "NO Record inserted";
}
}
?>