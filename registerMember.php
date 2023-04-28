<?php
include 'connect.php';// include connection to MySQL Server

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
 
  //read data from the form
  $un = $_POST[ 'username' ];
  $ln = $_POST[ 'lname' ];
  $fn = $_POST[ 'fname' ];
  $ph = $_POST[ 'phone ' ];
  $date = date("y-m-d h:i:s"); //date time
  $p = $_POST[ 'password' ];

}
# Initialize an error array.
  $errors = array();

 # Check if email address already registered.
 
    $q = "SELECT * FROM Members WHERE Username='$un'" ;
    // Issue the query
    $r = $database->query($q);

    if ( $r->num_rows > 0 )
    {
        $errors[] = 'Username already registered' ;
                #move to view page
        header("Location: newmember.html");
        echo 'Username already exists';
     	//exit();//Output a message and terminate the current script
    }
else
  {
  if($un == '' || $ln == '' || $fn == '' || $ph == '' || $p == '' ){
    header("Location: newmember.html");
  }else{
$sql="INSERT INTO Members(Username, Last_Name, First_Name, Phone, Date_Joined, Password)VALUES('$un', '$ln', '$fn', '$ph', '$date', '$p')";
// Issue the query

$result = $database->query($sql);

//check if query successful 
if($result)
{
#move to view page
	echo 'Member added';
     	exit();//Output a message and terminate the current script
  header("Location: memberlogin.php");
}
else 
{
$errors[] = 'ERROR';
}
  }
  }  ?>
