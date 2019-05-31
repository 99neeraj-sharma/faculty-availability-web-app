<?php
// include 'login.php';
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

if ($conn->query($sql) === TRUE) {
    echo "Database selected";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_select_db($conn, '$mydb');
echo $_SESSION['person'];
$emailvar = $_SESSION['person'];
$length = strlen($emailvar);
$firstemail = explode('@',$emailvar,-1);
$_SESSION['person2']=$firstemail[0];
echo $_SESSION['person2'];
echo "<br>";
echo $firstemail[0];
if(isset($_POST['value5'])){
    $sql = "UPDATE btech set stat='YES' where Email='$firstemail[0]'";
$result = $conn->query($sql);
}
header('Location: /hackthon/afterlogin/index.php');

$conn->close();
?>