<?php  
include("connection.php");

$user_name=$_POST['uname'];
$email=$_POST['email'];
$address_line1=$_POST['addressline1'];
$address_line2=$_POST['addressline2'];
$city= $_POST['city'];
$pincode=$_POST['pincode'];
$phone_number= $_POST['ph'];
$place=$_POST['place'];
$waste_category=$_POST['waste_category'];
$text=$_POST['textarea'];

if (array_key_exists("1",$waste_category))
  {
 	$other=$waste_category[1];
  	$sql = "INSERT INTO mediclean_db (uname, email,address_line1,address_line2,city,pincode,phone_number,place,covid_19,other,textt)
	VALUES ('$user_name', '$email', '$address_line1','$address_line2','$city','$pincode','$phone_number','$place','$waste_category[0]','$waste_category[1]','$text')";
  }
else if($waste_category[0]=="covid-19")
{
	$var="covid_19";
	$sql = "INSERT INTO mediclean_db (uname, email,address_line1,address_line2,city,pincode,phone_number,place,covid_19,other,textt)
	VALUES ('$user_name', '$email', '$address_line1','$address_line2','$city','$pincode','$phone_number','$place','$var',null,'$text')";
}
else if($waste_category[0]=="Other_medical_waste")
{
	$var_1="Other_medical_waste";
	$sql = "INSERT INTO mediclean_db (uname, email,address_line1,address_line2,city,pincode,phone_number,place,covid_19,other,textt)
	VALUES ('$user_name', '$email', '$address_line1','$address_line2','$city','$pincode','$phone_number','$place',null,'$var_1','$text')";
}
  if ($connection->query($sql) === TRUE) {
     header('Location: pop.html');
 } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
 }

$connection->close();

?>