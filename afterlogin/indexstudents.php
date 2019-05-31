<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/img/introbg.jpg');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
    background-image: url('/img/introbg.jpg');
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

body{
  background-image: url('introbg.jpg');

}
h1
{
  color: white;
}

</style>
</head>
<body>
<!-- <H1 align="center" color=#ffff>Welcome to</H1> -->
<br></br>
<p align="center" style="margin-top: 1em color:white"> <font size="7" face="sans-serif"> Welcome to You There?</font> </p>
<!-- <p1 >YOU THERE?</p1> -->
<form align="right" name="form1" method="post" action="logout.php">
  <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
</form><br>
</br>
<br>
</br><br>
</br><br>
</br><br>
</br><br>
</br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter the professor's name" title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th>Name</th>
    <th>Designation</th>
    <th>Email</th>
    <th>Office</th>
    <th>Availability</th>
  </tr>
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


$sql = "USE $mydb";

if ($conn->query($sql) === TRUE) {
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT Name, Designation, Office, stat, Email FROM btech";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  echo "<tr><td>".$row["Name"]."</td><td>".$row["Designation"]."</td><td>".$row["Email"]."</td><td>".$row["Office"]."</td><td>".$row["stat"]."</td></tr>";
}
$conn->close();
?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>
