
<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb="verification";

// Create connection
$conn = new mysqli($servername, $username, $password);
session_start();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
echo "<br>";
$sql = "USE $mydb";
$conn->select_db($mydb);
echo $_SESSION['person2'];
$emailvar = $_SESSION['person2'];
echo $emailvar;
$sql = "UPDATE btech SET stat='NO' WHERE Email='$emailvar'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
header("Location: /hackthon/index.html");
$conn->close();
?>
