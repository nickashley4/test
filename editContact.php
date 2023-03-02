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
        
    </style>
</head>
<body>
<h2>Edit <?php echo $_POST['fname'] . " " . $_POST['lname']; ?>'s Contact</h2>
    <form action="editContact.php" method="post">
        <input type="hidden" name='contact_id' value="<?php echo $_POST['contact_id']; ?>">
        <input type="hidden" name='userID' value="<?php echo $_POST['userID']; ?>">
        <input type="text" name="fname" value="<?php echo $_POST['fname']; ?>"><br>
        <input type="text" name="lname" value="<?php echo $_POST['lname']; ?>"><br>
        <input type="text" name="email" value="<?php echo $_POST['email']; ?>"><br>
        <input type="text" name="phone" value="<?php echo $_POST['phone']; ?>"><br>
        <input type="submit" value="Update">
    </form>
    <div class='container'>
        <a href="contacts.php">
            <button>View Contacts</button>
        </a>
    </div>

<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$contact_id = $_POST['contact_id'];
$userID = $_POST['userID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "UPDATE contact SET fname = '$fname', lname = '$lname', email = '$email', phone = '$phone' WHERE contact_id = '$contact_id'";

mysqli_query($conn,$sql);

mysqli_close($conn);

?>

</body>
</html>