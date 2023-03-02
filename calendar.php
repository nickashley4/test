<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Calendar</title>
    </head>

<body>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        justify-content: center;
    }

    td, th {
        border: 1px solid black;
        padding: 8px;
        height: 100px;
        width: 80px;
    }

    th {
        background-color: lightgray;
        text-align: center;
    }

    .today {
        background-color: lightyellow;
    }
    </style>

<div class="nav">
    <a href="home.php">Home</a>
    <a href="profile.php">Profile</a>
    <a href="schools.php">Schools</a>
    <a href="newsArticle.php">See Articles</a>
    <a href="contacts.php">Contacts</a>
    <a class='active' href="calendarFC.php">Calendar</a>
    <a href="colleagues.php">Colleagues</a>
</div> 

<?php

$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');
    if (!$conn) {
        die('Connection Failed: ' . mysqli_connect_error());
    }



$today = time();
$month = date("n", $today);
$year = date("Y", $today);


$firstDay = mktime(0, 0, 0, $month, 1, $year);
$monthName = date("F", $firstDay);

$numDays = date("t", $firstDay);
$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

$startDay = date("w", $firstDay);

$blankCells = $startDay;

echo "<table>";
echo "<tr><th colspan='7'> $monthName $year </th></tr>";
echo "<tr>";

foreach ($days as $day) {
    echo "<th> $day </th>";
}

echo "</tr>";

$day = 1;
echo "<tr>";
    for ($i = 0; $i < 7; $i++) {
        if ($i < $blankCells) {
            echo "<td>&nbsp;</td>";
        } else {
            if (mktime(0, 0, 0, $month, $day, $year) == $today) {
            echo "<td class='today'> $day </td>";
        } else {
            echo "<td> $day </td>";
        }
        $day++;
      }
    }

    echo "</tr>";


    while ($day <= $numDays) {
      echo "<tr>";
      for ($i = 0; $i < 7 && $day <= $numDays; $i++) {
        if (mktime(0, 0, 0, $month, $day, $year) == $today) {
          echo "<td class='today'> $day </td>";
        } else {
          echo "<td> $day </td>";
        }
        $day++;
      }
      echo "</tr>";
    }


    echo "</table>";

?>

</body>
</html>