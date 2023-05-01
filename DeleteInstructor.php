<?php
include 'connect.php';// include connection to MySQL Server

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
 
  //read data from the form
  $in = $_POST[ 'iname' ];

}
# Initialize an error array.
  $errors = array();

$sql="DELETE FROM Instructors WHERE InstructorName = '$in'";
// Issue the query

$result = $database->query($sql);

//check if query successful 
if($result)
{
#move to view page
	echo 'Instructor Deleted';
  header("Location: adminpage.php");
}
else 
{
$errors[] = 'ERROR';
}
 ?>
