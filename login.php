<?php
require 'class.phpmailer.php';
require 'class.smtp.php';
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
session_start();
if ($conn->query($sql) === TRUE) {
    echo "Database selected";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_select_db($conn, '$mydb');
$email=$_POST['username'];
$pass=$_POST['password'];
$sql = "SELECT username, pass, stat FROM emailpassword WHERE email='$email'";

$result = $conn->query($sql);
echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    if($pass != $row["pass"]){
        echo "<script type='text/javascript'>alert('password doesnot match retry again');</script>";
    echo '<script>window.location="/hackthon/index.html#tologin";</script>';
    }
    else if($row["stat"] =='deactive'){
        echo "<script type='text/javascript'>alert('your email is not verified');</script>";
    echo '<script>window.location="/hackthon/index.html#tologin";</script>';
    }
    else{
        $_SESSION['person']=$email;
        echo $_SESSION['person'];
        if(strpos($email,'students')){
            header('Location: /hackthon/afterlogin/indexstudents.php');
        }
        else{
            header('Location: /hackthon/afterlogin/index.php');
        }
    }

} else {
    // echo "<script type='text/javascript'>alert('email does not exist');</script>";
    echo '<script>window.location="/hackthon/index.html#toregister";</script>';
}
$conn->close();
?>