<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="styles.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
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
        button {
            width: 100px;
            height: 100px;
            border-radius: 50px; /* half of width and height */
            background-color: blue;
            color: white;
            border: none;
            margin: 10px;
        }
        .link {
            color: white;
        }
        .link:hover {
            color: red; 
        }
        .contacts {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .add {
            width: 50px !important;
            height: 50px !important;
            border-radius: 25px !important;
            background-color: #D3D3D3 !important;
            color: white !important;
            border: none !important;
            margin: 10px !important;
            justify-content: center !important;
            align-items: center !important;
        }
    </style>
</head>
<body>
<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$sql = "SELECT u.school, c.* FROM user AS u
        JOIN contact AS c ON c.userID = u.userID
        WHERE u.userID = 1000";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

?>
<div class="nav">
    <a href="home.php">Home</a>
    <a href="profile.php">Profile</a>
    <a href="schools.php">Schools</a>
    <a href="newsArticle.php">See Articles</a>
    <a class='active' href="contacts.php">Contacts</a>
    <a href="calendarFC.php">Calendar</a>
    <a href="colleagues.php">Colleagues</a>
</div>  
<div class="wrapper">
<div class="contacts">
    <?php while($user = mysqli_fetch_assoc($result)) { ?>
        <button>
            <a class="link" href="viewContact.php?fname=<?php echo $user['fname']; ?>&lname=<?php echo $user['lname']; ?>&email=<?php echo $user['email']; ?>&phone=<?php echo $user['phone']; ?>&userID=<?php echo $user['userID']; ?>&contact_id=<?php echo $user['contact_id']; ?>&school=<?php echo $user['school']; ?>">
                <?php echo $user['fname'] . " " . $user['lname']; ?>
            </a>
        </button>
    <?php } ?>
</div>

<div class='container'>
    <a href="addContact.php">
        <button class="add"><h1>+</h1></button>
    </a>
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