<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Project Name</h1>
    <h3>
        <?php
            $conn=mysqli_connect("db.luddy.indiana.edu","i494f22_team48","my+sql=i494f22_team48","i494f22_team48");
            if (mysqli_connect_errno())
            { die('Failed to connect to MySQL: ' . mysqli_connect_error()); } else
            session_start();
            echo $_SESSION['productID'];
        ?>
    </h3>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna aliqua. Vivamus at augue eget arcu dictum varius duis at consectetur. 
    Magna ac placerat vestibulum lectus mauris ultrices eros in. Egestas pretium aenean pharetra 
    magna ac placerat. Nunc pulvinar sapien et ligula. Ipsum consequat nisl vel pretium lectus quam. 
    Amet venenatis urna cursus eget nunc scelerisque viverra mauris. Molestie a iaculis at erat 
    pellentesque. Pulvinar neque laoreet suspendisse interdum. Interdum posuere lorem ipsum dolor. 
    Semper quis lectus nulla at volutpat diam ut venenatis tellus. Adipiscing enim eu turpis egestas 
    pretium aenean pharetra.

    Nam at lectus urna duis. Massa sed elementum tempus egestas sed sed risus pretium quam. 
    Risus pretium quam vulputate dignissim suspendisse in est ante. Sagittis aliquam malesuada 
    bibendum arcu vitae elementum curabitur vitae nunc. Interdum velit euismod in pellentesque. 
    Sapien eget mi proin sed libero. Facilisis magna etiam tempor orci eu lobortis elementum nibh. 
    At consectetur lorem donec massa sapien faucibus. Sed nisi lacus sed viverra tellus in. Lectus 
    nulla at volutpat diam. Sit amet tellus cras adipiscing.
    </p>

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



