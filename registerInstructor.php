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

 # Check if email address already registered.
 
    $q = "SELECT * FROM Instructors WHERE InstructorName='$in'" ;
    // Issue the query
    $r = $database->query($q);

    if ( $r->num_rows > 0 )
    {
        $errors[] = 'Instructor already registered' ;
                #move to view page
        header("Location: adminpage.php");
    }
else
  {
  if($in == ''){
    header("Location: adminpage.php");
  }else{
$sql="INSERT INTO Instructors(InstructorName)VALUES('$in')";
// Issue the query

$result = $database->query($sql);

//check if query successful 
if($result)
{
#move to view page
	echo 'Instructor added';
  header("Location: adminpage.php");
}
else 
{
$errors[] = 'ERROR';
}
  }
  }  ?>
