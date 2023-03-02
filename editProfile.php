<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        input[type="text"], textarea {
            width: 50%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 2px solid gray;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            background-color: blue;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            cursor: pointer;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }
        h2 {
            text-align: center;
        }
        .delete {
            background-color: red;
        }
        
    </style>
</head>
<body>
<script>
function showConfirmDelete() {
  if (confirm("Are you sure you want to delete your profile?")) {
    
    window.location.href = "deleteProfile.php?userID=<?php echo $user['userID']; ?>";
  }
}
</script>

<h2>Edit <?php echo $_POST['fname'] . " " . $_POST['lname']; ?>'s Profile</h2>
    <form action="updateProfile.php" method="post">
        <input type="hidden" name='userID' value="<?php echo $_POST['userID']; ?>">
        <input type="text" name="fname" value="<?php echo $_POST['fname']; ?>"><br>
        <input type="text" name="lname" value="<?php echo $_POST['lname']; ?>"><br>
        <input type="text" name="school" value="<?php echo $_POST['school']; ?>"><br>
        <input type="text" name="email" value="<?php echo $_POST['email']; ?>"><br>
        <input type="text" name="phone" value="<?php echo $_POST['phone']; ?>"><br>
        <textarea name='about'><?php echo $_POST['about']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$sql = "SELECT * from user WHERE userID = 1000";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
    
mysqli_close($conn);

?>

<form action="deleteProfile.php" method="post">
    <input type="hidden" name='userID' value="<?php echo $_POST['userID']; ?>">
    <!-- <input type="submit" value="Delete" class="delete" onclick="showConfirmDelete()"> -->
</form>

    <div class='container'>
        <a href="profile.php">
            <button>View Profile</button>
        </a>
    </div>
</body>
</html>

