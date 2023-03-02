<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  </style>
    <meta charset="UTF-8">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"  crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Colleagues</title>
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
    <a href="home.php">Home</a>
    <a href="profile.php">Profile</a>
    <a href="schools.php">Schools</a>
    <a href="newsArticle.php">See Articles</a>
    <a href="contacts.php">Contacts</a>
    <a href="calendarFC.php">Calendar</a>
    <a class='active' href="colleagues.php">Colleagues</a>
</div>  
<div class="wrapper">

<div class="container">
   <div class="row">
       <div class="col-md-12">
           <div class="card mt-4">
               <div class="card-header text-black">
                   <h4>Search for colleagues!</h4>
               </div>
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-7">
                           <form action="" method="GET">
                               <div class="input-group mb-3">
                                   <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search colleagues">
                                   <button type="submit" class="btn btn-primary">Search</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-md-12">
           <div class="card mt-4">
               <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>First Name</th>
                               <th>Last Name</th>
                               <th>Email</th>
                               <th>School</th>
                               <th>Field</th>
                           </tr>
                       </thead>
                       <tbody>
                            <?php
                            $conn=mysqli_connect("db.luddy.indiana.edu","i494f22_team48","my+sql=i494f22_team48","i494f22_team48");
                            if (mysqli_connect_errno())
                            { die('Failed to connect to MySQL: ' . mysqli_connect_error()); }
                            else
                            { echo '';}
                            
                            // Define the SELECT statement
                            $sql = "SELECT * FROM user";

                            // Execute the SELECT statement
                            $result = mysqli_query($conn, $sql);

                            // Display the data
                            /* if (mysqli_num_rows($result) > 0) {

                                // Output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "First Name: " . $row["fname"]. "Last Name: " . $row["lname"]. " Email: " . $row["email"]. " School: " . $row["school"]. "Field: " . $row["field"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }*/

                            // Check if a search keyword was submitted
                            if (isset($_GET["search"])) {
                                // Sanitize the search keyword to prevent SQL injection attacks
                                $search = mysqli_real_escape_string($conn, $_GET["search"]);
                                
                                // Define the search condition
                                $search_condition = "WHERE fname LIKE '%" . $search . "%' OR lname LIKE '%" . $search . "%' OR school LIKE '%" . $search . "%' OR field LIKE '%" . $search . "%'";
                                
                                // Define the SELECT statement with the search condition
                                $sql = "SELECT * FROM user " . $search_condition;
                                
                                // Execute the SELECT statement
                                $result = mysqli_query($conn, $sql);
                            }

                            // Display the search results
                            if (mysqli_num_rows($result) > 0) {
                                // Output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['school']; ?></td>
                                        <td><?= $row['field']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                                <?php
                            }

                            ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>
<br>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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
