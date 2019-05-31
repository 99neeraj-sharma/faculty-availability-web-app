<?php

$servername = "localhost";
$username = "root";
$password = "";
$mydb="verification";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
echo "<br>";

$sql = "USE $mydb";

if ($conn->query($sql) === TRUE) {
    echo "Database selected";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_select_db($conn, '$mydb');
// Passkey that got from link 
$passkey=$_GET['passkey'];
$tbl_name1="emailpassword";

// Retrieve data from table where row that match this passkey 
$sql = "UPDATE emailpassword SET stat='active' WHERE confirm_code='$passkey'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>