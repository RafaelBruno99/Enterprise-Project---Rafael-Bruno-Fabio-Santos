<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "enterprisedb");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$grade = mysqli_real_escape_string($link, $_REQUEST['list']);

// Attempt insert query execution
$sql = "UPDATE file SET grade = ('$grade')";
if(mysqli_query($link, $sql)){
    header("Location:tutor-document-management.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
