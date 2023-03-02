<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-signin-client_id" content="569107033722-1mh159gjug7hjtqi1eeaad7m9o6qostm.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile</title>
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
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
        h3, h5 {
            margin-top: 20px;
        }

        input[type="submit"] {
            width: 30%;
            padding: 10px;
            margin: 10px 0;
            background-color: #333;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
        }

        input[type="submit"]:hover {
            background-color: #fff;
            color: #333;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="nav">
        <a href="home.php">Home</a>
        <a class='active' href="profile.php">Profile</a>
        <a href="schools.php">Schools</a>
        <a href="newsArticle.php">See Articles</a>
        <a href="contacts.php">Contacts</a>
        <a href="calendarFC.php">Calendar</a>
        <a href="colleagues.php">Colleagues</a>
    </div>

<?php

$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$sql = "SELECT * from user WHERE userID = 1000";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>
<div class="wrapper">

<div class="container text-align center">

    <div class="row">
        <div class="col">
            <h3><?php echo $user['fname'] . " " . $user['lname']; ?></h3>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>Profile pic here</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h5><?php echo $user['school']; ?></h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h5><?php echo $user['email']; ?></h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h5><?php echo $user['phone']; ?></h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3>About <?php echo $user['fname']; ?></h3>
            <p><?php echo $user['about']; ?></p>
        </div>
    </div>
    <form action='editProfile.php' method='post'>
        <input type="hidden" name='userID' value="<?php echo $user['userID']; ?>">
        <input type="hidden" name="fname" value="<?php echo $user['fname']; ?>">
        <input type="hidden" name="lname" value="<?php echo $user['lname']; ?>">
        <input type="hidden" name="school" value="<?php echo $user['school']; ?>">
        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
        <input type="hidden" name="phone" value="<?php echo $user['phone']; ?>">
        <input type="hidden" name="about" value="<?php echo $user['about']; ?>">
        <input type="submit" value="Edit Profile">
    </form>
</div>

<div class="push"></div>
</div>

<footer>
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