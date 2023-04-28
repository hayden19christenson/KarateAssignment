<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Login</title>
</head>

<body>
<?php

session_start();

include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
// Get data from the form
$fn = "SELECT First_Name, Last_Name, Username, ID FROM Members WHERE Username='$username' AND Password='$password'";
// Issue the query
$r = $database->query($fn);

if ( $r->num_rows > 0 )
{
    while($row = $r->fetch_assoc()){
        
        $_SESSION['FirstName'] = $row['First_Name'];
        $_SESSION['LastName'] = $row['Last_Name'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['ID'] = $row['ID'];
        header("Location: memberspage.php");
    }
   
   
}
else{
    echo 'User not found';
}
$database->close();

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <div class="container">
        <?php include('header.html') ?>
        <div class="center mt-60">
        <form id="form1" name="form1" method="post" class="form">
            <h2>Login </h2>
            <br />
            <h4>Username</h4>
            <input name="username" type="text" id="username" size="40" />
            <br/><br/>
            <h4>Password</h4>
            <input name="password" type="text" id="password" size="40" />
            <br /><br />
            <div class="center">
                <input type="submit" name="Submit" value="Submit" class="button" />
            </div>
            <br/>
            <div class="centerVertical">
                New Member?
                <a href="newmember.html" class="button">Create an Account</a>
            </div>
        </form>
        </div>
        <?php include('footer.html') ?>
    </div>
</body>

</html>