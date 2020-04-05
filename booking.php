<?php
$Name=filter_input(INPUT_POST, 'Name');

$Phone_Number =filter_input(INPUT_POST, 'Phone_Number');

$Email =filter_input(INPUT_POST, 'Email');

$Gender=filter_input(INPUT_POST, 'Gender');





$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname="project_cse311";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Registetion failed: " . $conn->connect_error);
}




$sql="INSERT INTO customer (Name,Phone_Number,Email,Gender) values ('$Name','$Phone_Number','$Email','$Gender')";


if ($conn->query($sql) === TRUE) {
   echo "successfully Registered";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//create Ticket id from serial id
$last_id= mysqli_insert_id($conn);

if ($last_id){
$Ticket_id="ABI_".$last_id;
$Seat_No="S-".$last_id;
$query1="update customer SET `Ticket_id` ='".$Ticket_id."' where `id`='".$last_id."'";
$res1=mysqli_query($conn,$query1);
$query2="update customer SET `Seat_No` ='".$Seat_No."' where `id`='".$last_id."'";
$res2=mysqli_query($conn,$query2);
}



$quary3="insert into movie SET `Ticket_Id`='".$Ticket_id."', `Movie_Name`='The Imitation Game',`Director`='Morten Tyldum',`language`='English' ,`Release_Date`='2015-01-07' " ;

$quary4="insert into shows SET `Movie_Name`='The Imitation Game',`Show_Time`='1:30-3:30',`Date`='2019-04-26' ,`Hall_Name`='D1F' " ;

$quary5="insert into ticket SET `Ticket_id`='".$Ticket_id."', `Ticket_Price`='350',`Seat_No`='".$Seat_No."' ";




$res3=mysqli_query($conn,$quary3);
$res4=mysqli_query($conn,$quary4);

$res5=mysqli_query($conn,$quary5);

echo "<br>";
echo "Your Ticket Id is : $Ticket_id";
echo"<br>";
echo "Your seat no is: $Seat_No";


$conn->close();


?>