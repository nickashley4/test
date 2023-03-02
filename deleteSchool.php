<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  </style>
    <meta charset="UTF-8">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"  crossorigin="anonymous">
    <title>Delete School</title>
</head>

<body>
    <div class="nav">
        <a href="home.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="patentedProducts.php">Recent Projects</a>
        <a class="active" href="schools.php">Schools</a>
        <a href="newsArticle.php">See Articles</a>
        <a href="contacts.php">Contacts</a>
        <a href="calendarFC.php">Calendar</a>
        <a href="colleagues.php">Colleagues</a>
    </div> 

    <br>

    <form method="post" action="">
        <label for="schoolID">Enter School ID to Delete:</label>
        <input type="text" id="schoolID" name="schoolID">
        <input type="submit" name="delete" value="Delete">
    </form>


    <?php
    if(isset($_POST['delete'])) {
        $schoolID = $_POST['schoolID'];
        $conn = mysqli_connect("db.luddy.indiana.edu","i494f22_team48","my+sql=i494f22_team48","i494f22_team48");
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "DELETE FROM school WHERE schoolID = $schoolID";
        if(mysqli_query($conn, $sql)) {
            echo "Record deleted successfully. <a href='schools.php'>Return to Schools List</a>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
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