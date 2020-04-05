<!DOCTYPE html>
<html>
<head>
	<title>Table with database</title>
</head>
<body>
<table>
	<tr>
	
</tr>
<?php

$username=filter_input(INPUT_POST, 'username');

$password=filter_input(INPUT_POST, 'password');

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname="project_cse311";
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword,$dbname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result1=mysqli_query($conn,"select * from customer");

$result2=mysqli_query($conn,"select * from movie ");

$result3=mysqli_query($conn,"select * from shows ");

$result4=mysqli_query($conn,"select * from ticket ");



echo "<table border='1'>
<tr>
	<th>ID</th>
<th>Name</th>
<th>Phone_Number</th>
<th>Email</th>
<th>Gender</th>
<th>Ticket_id</th>
<th>Movie_Name</th>
<th>Hall_Name</th>
<th>Seat_No</th>
<th>Show_Time</th>
<th>Ticket_Price</th>
<th>Booked_Time</th>

</tr>";




while($row = mysqli_fetch_array($result1))
{

if($row2 = mysqli_fetch_array($result2))
{
	if($row3 = mysqli_fetch_array($result3))
{
if($row4 = mysqli_fetch_array($result4))
{


echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['Name'] . "</td>";
	echo "<td>" . $row['Phone_Number'] . "</td>";
	echo "<td>" . $row['Email'] . "</td>";
	echo "<td>" . $row['Gender'] . "</td>";
	echo "<td>" . $row['Ticket_id'] . "</td>";
	echo "<td>" . $row2['Movie_Name'] . "</td>";
	echo "<td>" . $row3['Hall_Name'] . "</td>";
    echo "<td>" . $row['Seat_No'] . "</td>";
	echo "<td>" . $row3['Show_Time'] . "</td>";
echo "<td>" . $row4['Ticket_Price'] . "</td>";
echo "<td>" . $row4['Booked_Time'] . "</td>";

}	
}
}

echo "</tr>";
}


echo "</table>";



mysqli_close($conn);
?>
</table>


</body>
</html>