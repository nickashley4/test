<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  </style>
    <meta charset="UTF-8">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"  crossorigin="anonymous">
    <title>Schools</title>
</head>

<body>
<style>
    html, body {
        height: 100%;
        margin: 0;
        }
    .wrapper {
        min-height:100%;
        margin-bottom: -100px;
    }
    .foot, 
    .push {
        height: 100px;
    }
    th, td {
        padding: 10px;
        margin: 10px
    }
    table.center {
        margin-left:auto;
        margin-right: auto;
    }
    h6 {
        text-align: center;
    }
    div.none {
        text-align: center;
    }
</style>

<div class="nav">
    <a href="home.php">Home</a>
    <a href="profile.php">Profile</a>
    <a class='active' href="schools.php">Schools</a>
    <a href="newsArticle.php">See Articles</a>
    <a href="contacts.php">Contacts</a>
    <a href="calendarFC.php">Calendar</a>
    <a href="colleagues.php">Colleagues</a>
</div>  

<div class='container'>
    <div class='row'>
        <div class='col'></div>
        <div class='col'><h2>Schools</h2></div>
        <div class='col'></div>
    </div>
</div>
<div class="wrapper">
<?php
// Database connection
$conn=mysqli_connect("db.luddy.indiana.edu","i494f22_team48","my+sql=i494f22_team48","i494f22_team48");
if (mysqli_connect_errno())
{ die('Failed to connect to MySQL: ' . mysqli_connect_error()); }
else
{ echo '';}
?>

<?php
// Query the database for schools
$sql_schools = "SELECT * FROM school";
$result_schools = mysqli_query($conn, $sql_schools);

// Loop through each school and display a table of users
if (mysqli_num_rows($result_schools) > 0) {
    while($row_school = mysqli_fetch_assoc($result_schools)) {
      $schoolID = $row_school["schoolID"];
      $schoolName = $row_school["schoolName"];
      $sql_users = "SELECT * FROM user WHERE schoolID = $schoolID LIMIT 10";
      $result_users = mysqli_query($conn, $sql_users);
      ?>

      <div class='container'>
            <div class='row'>
                <div class='col'>

                </div>
                <div class='col'>
                    <h4><?= $schoolName ?></h4>
                </div>
                <div class='col'>
                    
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <?= $row_school['address'] ?>
                </div>
                <div class='col'>  
                </div>
                <div class='col'>
                    <?= $row_school['products'] ?>
                </div>
            </div>
            <div class='row'>
                <div class='row'>
                    <?= $row_school['about'] ?>
                </div>
            </div>
        </div>

    <?php
      if (mysqli_num_rows($result_users) > 0) { ?>

        <table class='center'>
        <h6>Colleagues</h6>
        <tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Field</th></tr>

        <?php while($row_user = mysqli_fetch_assoc($result_users)) {
          echo "<tr><td>".$row_user["fname"]."</td><td>".$row_user["lname"]."</td><td>".$row_user["email"]."</td><td>".$row_user["field"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "<br><div class='none'>No users found for this school.</div><br>";
      }
    }
  } else {
    echo "No schools found.";
  }
  
mysqli_close($conn);
?>

<div class='container'>
   <div class='row text-center'>
      <div class='col text-center'>
         <h4>Don't see your school? Click <a href='addSchool.php'>here<a> to add your school!</h4><br><br>
      </div>
      <div class='col text-center'>
         <h4>Need to delete a school? Click <a href='deleteSchool.php'>here<a> to delete your school.</h4><br><br>
      </div>
   </div>
</div>

<div class="push"></div>
</div>

<footer class="foot">
   <div class='footer-container'>
      <div class='footer'>
         <div class='footer-heading'>
            <h2>MedExchange &copy; 2023</h2>
         </div>
      </div>
      <div class='footer'>
         <div class='footer-heading footer'>
            <a href="home.php">Home</a>
         </div>
         <div class='footer-heading footer'>
            <a href="profile.php">Profile</a>
         </div>
         <div class='footer-heading footer'>
            <a href="schools.php">Schools</a>
         </div>
         <div class='footer-heading footer'>
            <a href="newsArticle.php">See Articles</a>
         </div>
         <div class='footer-heading footer'>
            <a href="contacts.php">Contacts</a>
         </div>
         <div class='footer-heading footer'>
            <a href="calendar.php">Calendar</a>
         </div>
      </div>
   </div>
</footer>

</body>
</html>
