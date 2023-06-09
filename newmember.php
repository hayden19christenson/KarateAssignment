<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="app.css" />
    <title>Document</title>
  </head>

  <body>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    
    <div class="centerVertical container">
        <?php include('header.html') ?>
      <form
        id="form1"
        name="form1"
        method="post"
        class="form"
        action="registerMember.php"
      >
        <h2>New Member</h2>
        <br />
        <h4>Username</h4>
        <input name="username" type="text" id="username" size="40" maxLength="10"/>
        <h4>Last Name</h4>
        <input name="lname" type="text" id="lname" size="40" />
        <h4>First Name</h4>
        <input name="fname" type="text" id="fname" size="40" />
        <h4>Phone</h4>
        <input name="phone" type="text" id="phone" size="40" />
        <h4>Password</h4>
        <input name="password" type="text" id="password" size="40" maxLength="10"/>
        <br /><br />
        <div class="center">
          <input type="submit" name="Submit" value="Submit" class="button" />
        </div>
        <br />
        <div class="centerVertical">
          Have an account?
          <a href="memberlogin.php" class="button">Login Instead</a>
        </div>
      </form>
      <?php include('footer.html') ?>
    </div>
    
  </body>
</html>
