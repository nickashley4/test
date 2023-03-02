<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home</title>
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
    </style>
</head>
<body>

<div class="nav">
    <a class='active' href="home.php">Home</a>
    <a href="profile.php">Profile</a>
    <a href="schools.php">Schools</a>
    <a href="newsArticle.php">See Articles</a>
    <a href="contacts.php">Contacts</a>
    <a href="calendarFC.php">Calendar</a>
    <a href="colleagues.php">Colleagues</a>
    <a href="<?php echo $authorizationUrl; ?>">Login with Google</a>
</div> 

<div class="wrapper">

    <div class="container">
<div class="row mainHeader">
<div>
  <button class="button accent1Button">
    <p>See Who's involved</p>
  </button>
</div>

<div>
  <button class="button accent2Button">
    <p>Read More</p>
  </button>
</div>

<div>
  <button class="button circleButton">
    <p>Profile</p>
  </button>
</div>
  <img src="assets/Med.jpg" class="logo" height="100" width="250">
</div>
</div>

<section class="posts">
  <h2>
    Posts Section
</h2>
</section>

<section class="posts">
  <?php
    $conn=mysqli_connect("db.luddy.indiana.edu","i494f22_team48","my+sql=i494f22_team48","i494f22_team48");
    if (mysqli_connect_errno())
    { die('Failed to connect to MySQL: ' . mysqli_connect_error()); } else
    session_start();
    $sql = "SELECT * FROM patent_project;";
  $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)):
    $_SESSION['productID'] = $row['productID']
  ?>

  <div class="grid">
    <div class="grid-item">
      <div class="card-content">
        <h2 class="card-header"> 
          <?php echo $row['projectName'] ?>
        </h2>
        <p class="card-text">
          <?php echo $row['projectSummary']?>
        </p>
        <button class="card-btn">
        <a href="projectDetails.php">Details</a>
        <span>&rarr;</span>
        </button>
      </div>
    </div>
  </div>
  <?php endwhile ?>
</section>

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
         <div class='footer-heading footer'>
            <a href="config.php">Login</a>
         </div>
      </div>
   </div>
</footer>

</body>
</html>
