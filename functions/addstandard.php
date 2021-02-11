<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "enterprisedb");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$standard = mysqli_real_escape_string($link, $_REQUEST['standard_name']);

// Attempt insert query execution
$sql = "INSERT INTO standards (standard_name) VALUES ('$standard')";
if(mysqli_query($link, $sql)){
    header("Location:tutor-standard-management.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
