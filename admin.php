<!DOCTYPE html>
<html>
<head>
	<title>Ticket booking Confirmation</title>
</head>
<body>
<table>
	
<?php



$Ticket_id=filter_input(INPUT_POST, 'Ticket_id');




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

$result = mysqli_query($conn,"select Ticket_id from customer where Ticket_id='$Ticket_id' ");


while($row = mysqli_fetch_assoc($result)){
$tdb=$row['Ticket_id'];
}

if($tdb == $Ticket_id){


 	echo nl2br ("Your Ticket Has been successfully booked\n");
 	
 }


else{
 	echo nl2br("Not Booked for the Ticket\n");
}
 	




mysqli_close($conn);
?>
</table>


</body>
</html>
