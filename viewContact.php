<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href='styles.css'>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #bbb;
            text-align: center;
            width: 300px;
        }

        h2 {
            margin: 0;
        }

        p {
            margin: 10px 0;
        }
        .back img {
            width: 35px;
            height: 35px;
        }
        .editform {
            padding: 10px;
        }
        .delform {
            padding: 10px;
        }
        input[type="image"] {
            width: 35px;
            height: 35px;
        }
        .images {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .contact {
            padding: 10px;
        }
    </style> 
</head>
<body>
<script>
function showConfirmDelete() {
  if (confirm("Are you sure you want to delete this contact?")) {
    
    window.location.href = "deleteContact.php?contact_id=<?php echo $user['contact_id']; ?>&userID=<?php echo $user['userID']; ?>";
  }
}
</script>
<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$contact_id = mysqli_real_escape_string($conn, $_GET['contact_id']);
$userID = mysqli_real_escape_string($conn, $_GET['userID']);

$sql = "SELECT c.fname, c.lname, c.email, c.phone, c.userID, c.contact_id, u.school 
        FROM user AS u
        JOIN contact AS c ON c.userID = u.userID
        WHERE contact_id ='$contact_id'";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>
<div class="col">
    <div class="container">
        <div class="card">
            <h2><?php echo $user['fname'] . " " . $user['lname']; ?></h2>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
            <p><strong>School:</strong> <?php echo $user['school']; ?></p>
        </div>
        
        <div class="row">
            <div class="images">
                <div class="editform">
                    <form action='editContact.php' method='post'>
                        <input type="hidden" name='contact_id' value="<?php echo $user['contact_id']; ?>">
                        <input type="hidden" name='userID' value="<?php echo $user['userID']; ?>">
                        <input type="hidden" name="fname" value="<?php echo $user['fname']; ?>">
                        <input type="hidden" name="lname" value="<?php echo $user['lname']; ?>">
                        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
                        <input type="hidden" name="phone" value="<?php echo $user['phone']; ?>">
                        <input type="image" src="images/write.png" alt="Edit Contact">
                    </form>
                </div>

                <div class="delform">
                    <form action='deleteContact.php' method='post'>
                        <input type="hidden" name='contact_id' value="<?php echo $user['contact_id']; ?>">
                        <input type="hidden" name='userID' value="<?php echo $user['userID']; ?>">
                        <input type="image" src="images/delete.png" alt="Delete Contact" onclick="showConfirmDelete()">
                    </form>
                </div>

                <div class="contact">
                    <a class="back" href="contacts.php">
                        <img src="images/contact-book.png" alt="contacts">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

