<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Saved Articles</title>
    </head>

<body>
<style>
    h1 {text-align: center;
    }
    h5 {text-align: center;
    }
    .column {
        float: left;
        width: 45%;
        padding: 10px;
        margin: 10px;
      }
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 95%;
      }
      .container {
        display: grid;
        height: 50vh;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        grid-template-areas: "content1 content3" "content2 content3";
        grid-gap: 0.2rem;
      }
      #content1 {
        justify-content: center;
        text-align: center;
        grid-area: content1;
      }
      #content2 {
        text-align: center;
        grid-area: content2;
      }
      #content3 {
        grid-area: content3;
      }
      #content3pic {
        justify-content: center;
        border-radius: 20%;
      }
</style>

<h1>Saved Articles</h1>
<a href="newsArticle.php">< Back</a>

<br>
<br>
<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');
if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}

$sql = "SELECT articleName, articleLink, articlePhoto FROM saved_article;";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0) {
    echo "<h5>There are no saved articles.<h5>";
} else {
    while($row = mysqli_fetch_assoc($result)):
?>

<div class="container">
    <div id="content1">
        <?php echo "<h2>" .$row['articleName']. "</h2>" ?>
    </div>
    <div id="content2">
        <?php echo "<a href='" .$row['articleLink']. "'><h3>Click here to view article.</h3></a>" ?>
        <form action="" method="post">
        <input type="hidden" name="articleName" value="<?php echo $row['articleName']; ?>">
        <input type="submit" name="delete" value="Unsave Article">
        </form>
    </div>
    <div id="content3">
        <div id="content3pic">
            <?php echo "<img src='" .$row['articlePhoto']. "' class='center'>" ?>
        </div>
    </div>
</div>
<br />
<hr>
<br>

<?php endwhile; ?>

<?php
    if(isset($_POST['delete'])){
        $articleName = $_POST['articleName'];
      
        $sql = "DELETE FROM saved_article WHERE articleName = ?";
      
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $articleName);
      
        if(mysqli_stmt_execute($stmt)){
          header("Location: savedArticles.php");
          exit();
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
    }
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