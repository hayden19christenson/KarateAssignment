<?php
include 'connect.php';// include connection to MySQL Server
session_start();
# Check form submitted.
echo 'test1';
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
 
  //read data from the form
  $enroll = $_POST[ 'enrollmentRadio' ];
  $instruct = $_POST[ 'instructor' ];

}
# Initialize an error array.
  $errors = array();
 # Check if email address already registered.
 echo 'test2';
    $ID = $_SESSION['ID'];
    $date = date("y-m-d h:i:s"); //date time
    if($enroll == 'Tiny Tigers'){
        $amount = 70;
    }
    if($enroll == 'Little Ninjas'){
        $amount = 100;
    }
    if($enroll == 'Junior'){
        $amount = 120;
    }
    if($enroll == 'Tactical'){
        $amount = 140;
    }else{
        echo 'no1';
    }
    $q = "INSERT INTO Payments (Member_Id, Payment_Date, Amount) VALUES ($ID, '$date', $amount)" ;
    // Issue the query
    $r = $database->query($q);

    if ( $r )
    {
        echo 'Payment Added';
     	//exit();//Output a message and terminate the current script
        $q = "SELECT ID FROM Payments ORDER BY ID DESC LIMIT 1";
        $r = $database->query($q);
        if ( $r->num_rows > 0 )
        {
            while($row = $r->fetch_assoc()){
              echo $row['ID'];
              $pID = $row['ID'];
            }
        }
    }
    else{
        echo 'no2';
    }
    echo 'test4' . $pID;
    $q = "INSERT INTO Enrollments (Member_Id, Payment_Id, ProgramName, Instructor_Id) VALUES ($ID, $pID, '$enroll', $instruct)";
    // Issue the query
    $r = $database->query($q);

    if ( $r )
    {
        echo 'Enrollment Added';
        header("Location: memberspage.php");
     	//exit();//Output a message and terminate the current script
    }else{
        echo 'no3';
    }

    echo 'test5';
 ?>
