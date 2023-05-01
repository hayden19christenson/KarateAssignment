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
    <?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `MEMBERS` WHERE CONCAT(`ID`, `Last_Name`, `age`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `MEMBERS`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    return $filter_Result;
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <div class="container">
        <div class="center mt-60">
            <button onclick="window.location.href = 'memberlogin.php';" class="button">Login to Your Page</button>
        </div>
        <h2>Instructors</h2>
        <div class="center">
            <table class="table tableWidth">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Instructor Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    include 'connect.php';// include connection to MySQL Server

                    session_start();
                    # Initialize an error array.
                    $errors = array();

                    $ID = $_SESSION['ID'];
                    $q = "SELECT ID, InstructorName FROM Instructors";
                    $r = $database->query($q);
                    if ( $r->num_rows > 0 )
                    {
                    while($row = $r->fetch_assoc()){
                        echo '<tr>' . '<td>' . $row['ID'] . '</td>'
                        . '<td>' . $row['InstructorName'] . '</td>' . '</tr>';
                    }
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <div class="center">
        <form id="form1" name="form1" method="post" class="form" action="registerInstructor.php">
            <h2>Add Instructor</h2>
            <h4>Name</h4>
            <input name="iname" type="text" id="iname" size="40" />
            <div class="center">
                <input type="submit" name="Submit" value="Add" class="button" />
            </div>
        </form>
        <form id="form1" name="form1" method="post" class="form" action="DeleteInstructor.php">
            <h2>Delete Instructor</h2>
            <h4>Name</h4>
            <input name="iname" type="text" id="iname" size="40" />
            <div class="center">
                <input type="submit" name="Submit" value="Delete" class="button" />
            </div>
        </form>
    </div>
        <br /><br />
        
        <h2>Members</h2>
        <div class="center">
            <form action="updateMemberFilter.php" method="post">
            <div class="center">
            <input type="text" name="ID" placeholder="ID/LastName"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
        </div>
            <table class="table tableWidth">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    include 'connect.php';// include connection to MySQL Server

                    session_start();
                    # Initialize an error array.
                    $errors = array();

                    $ID = $_SESSION['IDFilter'];

                    if($ID != ''){
                        $q = "SELECT * FROM Members WHERE Username != 'admin' AND (Last_Name LIKE '%$ID%' OR ID = '$ID')";
                    }else{                   
                        $q = "SELECT * FROM Members WHERE Username != 'admin'";
                    }
                    
                    $r = $database->query($q);
                    if ( $r->num_rows > 0 )
                    {
                    while($row = $r->fetch_assoc()){
                        echo '<tr>' . '<td>' . $row['ID'] . '</td>'
                        . '<td>' . $row['Username'] . '</td>'
                        . '<td>' . $row['First_Name'] . ' ' . $row['Last_Name'] . '</td>'
                        . '<td>' . $row['Phone'] . '</td>' . '</tr>';
                    }
                    }

                    ?>
                </tbody>
            </table>
            
        </form>
        </div>
        <div class="center bg-blue w-full">
            <div class="centerVertical">
                <a href="registerMember.php" class="button">Add Member</a>
            </div>
            <form id="form1" name="form1" method="post" class="form" action="editMember.php">
                <h2>Edit Member</h2>
                <h4>ID</h4>
                <input name="ID" type="text" id="ID" size="40" />
                <h4>Username</h4>
                <input name="username" type="text" id="username" size="40" />
                <h4>Last Name</h4>
                <input name="lname" type="text" id="lname" size="40" />
                <h4>First Name</h4>
                <input name="fname" type="text" id="fname" size="40" />
                <h4>Phone</h4>
                <input name="phone" type="text" id="phone" size="40" />
                <h4>Password</h4>
                <input name="password" type="text" id="password" size="40" />
                <div class="center">
                    <input type="submit" name="Submit" value="Update" class="button" />
                </div>
            </form>
        </div>
    </div>

</body>

</html>