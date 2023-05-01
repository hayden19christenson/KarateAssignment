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
    <div class="container centerVertical">
      <?php include('header.html') ?>
      <form
        action="registerKarate.php"
        id="enrollForm"
        method="post"
        class="form"
      >
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="enrollmentRadio"
            id="tinytigers"
            value="Tiny Tigers"
          />
          <label class="form-check-label" for="tinytigers">
            The <b>Tiny Tigers</b> Program focuses on exposing 2 and 3 year olds
            to a classroom setting and helping them to begin learning listening,
            focus, and basic motor skills ($70.00)
          </label>
        </div>
        <br />
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            value="Little Ninjas"
            name="enrollmentRadio"
            id="littleninjas"
            checked
          />
          <label class="form-check-label" for="littleninjas">
            The <b>Little Ninjas</b> Program focuses on 4 - 10 year olds.
            Program is improving listening, focusing, and basic motor skills.
            ($100.00)
          </label>
        </div>
        <br />
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="enrollmentRadio"
            id="junior"
            value="Junior"
            checked
          />
          <label class="form-check-label" for="junior">
            The <b>Junior</b> Program focuses on 11 - 16 year olds. Program
            system is designed with the new student in mind. Educating them from
            Beginner to Advanced Technician over the life of the training.
            ($120.00)
          </label>
        </div>
        <br />
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="enrollmentRadio"
            id="tactical"
            value="Tactical"
            checked
          />
          <label class="form-check-label" for="tactical">
            The <b>Defense and Tactical Training</b> Program focuses on
            educating individuals to effectively maintain the safety and
            well-being of themselves and their families in any situation that
            could occur. ($140.00)
          </label>
        </div>
        <br />
        <div>
          Select Instructor
          <select name="instructor" id="instructor">
            <?php

              include 'connect.php';// include connection to MySQL Server

              session_start();
              # Initialize an error array.
              $errors = array();

              $q = "SELECT * FROM Instructors";
              $r = $database->query($q);
              if ( $r->num_rows > 0 )
              {
              while($row = $r->fetch_assoc()){
                  echo "<option value='" . $row['ID'] . "'>" . $row['InstructorName'] . "</option>";
              }
              }

            ?>
          </select>
        </div>
        <br />
        <div class="center">
          <input type="submit" name="Submit" value="Submit" class="button" />
        </div>
      </form>
      <?php include('footer.html') ?>
    </div>
  </body>
</html>
