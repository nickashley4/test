<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  </style>
    <meta charset="UTF-8">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"  crossorigin="anonymous">
    <title>Add School</title>
</head>

<body>
    <div class="nav">
        <a href="home.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="patentedProducts.php">Recent Projects</a>
        <a class="active" href="schools.php">Schools</a>
        <a href="newsArticle.php">See Articles</a>
        <a href="contacts.php">Contacts</a>
        <a href="colleagues.php">Colleagues</a>
    </div> 

    <br>

   <form action="addSchool.php" method="post">
      <input type="hidden" name="submitted" value="true">
      <label for="schoolName">School Name:</label>
      <input type="text" name="schoolName" required><br>

      <label for="address">Address:</label>
      <input type="text" name="address" required><br>

      <label for="products">Products:</label>
      <input type="text" name="products" required><br>

      <label for="about">About:</label>
      <input type="text" name="about" required><br>

      <input type="submit" value="Submit">
    </form>
    <br>

    <?php
    //Database Connection
    $conn = mysqli_connect("db.luddy.indiana.edu","i494f22_team48","my+sql=i494f22_team48","i494f22_team48");
    if (mysqli_connect_errno())
    { die('Failed to connect to MySQL: ' . mysqli_connect_error()); }
    else
    { echo ' ';}

    if (isset($_POST['submitted'])) {
      $schoolName = $_POST['schoolName'];
      $address = $_POST['address'];
      $products = $_POST['products'];
      $about = $_POST['about'];

    $sql = "INSERT INTO school(schoolName, address, products, about) VALUES ('$schoolName', '$address', '$products', '$about')";
    if (mysqli_query($conn, $sql)) {
      header('Location: schools.php');
        exit;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    mysqli_close($con);
    ?>
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