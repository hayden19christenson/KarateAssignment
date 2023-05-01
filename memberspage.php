<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <div class="container">
        <br/>   
        <?php
          session_start();
            if(isset($_SESSION['FirstName'])) {
              echo '<h4>' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . '</h4>';
              }
        ?> 
        <h2>Member Information</h2>

        <div class="center">
        <table class="table tableWidth">
            <thead>
              <tr>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Phone #</th>
                <th scope="col">Date Joined</th>
              </tr>
            </thead>
            <tbody>
              <?php

                include 'connect.php';// include connection to MySQL Server

                session_start();
                # Initialize an error array.
                $errors = array();

                $un = $_SESSION['Username'];
                $q = "SELECT * FROM Members WHERE Username='$un'" ;
                // Issue the query
                $r = $database->query($q);

                if ( $r->num_rows > 0 )
                {
                    while($row = $r->fetch_assoc()){
                      echo '<tr>' . '<td>' . $row['First_Name'] . '</td>'
                      . '<td>' . $row['Last_Name'] . '</td>'
                      . '<td>' . $row['Phone'] . '</td>'
                      . '<td>' . $row['Date_Joined'] . '</td>' . '</tr>';
                    }
                }

              ?>
            </tbody>
          </table>
          </div>
          <br/><br/>
          
          <h2>Payments</h2>
          <div class="center">
          <table class="table tableWidth">
            <thead>
              <tr>
                <th scope="col">Payment Date</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php

                include 'connect.php';// include connection to MySQL Server

                session_start();
                # Initialize an error array.
                $errors = array();

                $ID = $_SESSION['ID'];
                $q = "SELECT Payment_Date, Amount FROM Payments WHERE Member_Id=$ID";
                $r = $database->query($q);
                if ( $r->num_rows > 0 )
                {
                  while($row = $r->fetch_assoc()){
                    echo '<tr>' . '<td>' . $row['Payment_Date'] . '</td>'
                    . '<td>' . $row['Amount'] . '</td>' . '</tr>';
                  }
                }

              ?>
            </tbody>
          </table>
        </div>
        <br/><br/>

        <h2>Enrollments</h2>
          <div class="center">
          <table class="table tableWidth">
            <thead>
              <tr>
                <th scope="col">Program Name</th>
                <th scope="col">Instructor</th>
              </tr>
            </thead>
            <tbody>
              <?php

                include 'connect.php';// include connection to MySQL Server

                session_start();
                # Initialize an error array.
                $errors = array();

                $ID = $_SESSION['ID'];
                $q = "SELECT ProgramName, InstructorName FROM Enrollments AS en JOIN Instructors AS ins ON ins.ID = en.Instructor_Id WHERE Member_Id=$ID";
                $r = $database->query($q);
                if ( $r->num_rows > 0 )
                {
                  while($row = $r->fetch_assoc()){
                    echo '<tr>' . '<td>' . $row['ProgramName'] . '</td>'
                    . '<td>' . $row['InstructorName'] . '</td>' . '</tr>';
                  }
                }

              ?>
            </tbody>
          </table>
        </div>
        <br/><br/>

        <div class="center">
            <a href="karateregistration.php" class="button">Register for Karate</a>
            <form action="logout.php">
              <button type="submit" class="button">Logout</button>
            </form>
        </div>
        
        <?php include('footer.html') ?>
    </div>
</body>

</html>