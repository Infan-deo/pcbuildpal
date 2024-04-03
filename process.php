<?php
if(isset($_GET['buttonName'])) {
    $buttonName = $_GET['buttonName'];
    echo "Received button name: " . $buttonName;
;

    // You can perform further actions based on the button name
} else {
    echo "Button name not received.";
}

?>
