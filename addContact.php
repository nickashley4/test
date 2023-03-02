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
    </style>
</head>
<body>


<form action="add.php" method="post">
        <input type="hidden" name='userID' value="1000">
        <input type="text" name="fname" placeholder="First Name"><br>
        <input type="text" name="lname" placeholder="Last Name"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="phone" placeholder="Phone Number"><br>
        <input type="submit" value="Add">
    </form>
    <div class='container'>
        <a href="contacts.php">
            <button>Back</button>
        </a>
    </div>

</body>
</html>