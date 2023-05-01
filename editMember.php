<?php
include 'connect.php';// include connection to MySQL Server

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
 
  //read data from the form
  $ID = $_POST[ 'ID' ];
  $un = $_POST[ 'username' ];
  $ln = $_POST[ 'lname' ];
  $fn = $_POST[ 'fname' ];
  $ph = (int)$_POST[ 'phone' ];
  $date = date("y-m-d h:i:s"); //date time
  $p = $_POST[ 'password' ];

}
# Initialize an error array.
  $errors = array();

$sql="UPDATE Members SET Username = '$un', Last_Name='$ln', First_Name='$fn', Phone=$ph, Password='$p' WHERE ID = $ID AND Username != 'admin'";
// Issue the query

$result = $database->query($sql);

//check if query successful 
if($result)
{
#move to view page
	echo 'Member Updated';
  header("Location: adminpage.php");
}
else 
{
$errors[] = 'ERROR';
} ?>
