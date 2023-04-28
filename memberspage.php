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
      <?php include('header.html') ?>
        <br/> 
          <?php
          session_start();
            if(isset($_SESSION['FirstName'])) {
              echo $_SESSION['FirstName'];
              echo $_SESSION['LastName'];
              }
        ?>
        <div class="center mt-60">
        <h2>Member Information</h2>
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
              <tr>
                <td >Kalvin</td>
                <td>Johnson</td>
                <td>320-454-3423</td>
                <td>4/28/2023</td>
              </tr>
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
              <tr>
                <td >4/28/2023</td>
                <td>$420.69</td>
              </tr>
            </tbody>
          </table>
        </div>
        <br/><br/>
        <div class="center">
            <a href="karateregistration.html" class="button">Register for Karate</a>
        </div>
        <?php include('footer.html') ?>
    </div>
</body>

</html>