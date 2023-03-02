<?php
// Retrieve the event ID from the query string
$event_id = isset($_GET['id']) ? $_GET['id'] : '';

// Query the database for the event data
// Replace the placeholders with your actual database credentials
$pdo = new PDO('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');
$stmt = $pdo->prepare('SELECT * FROM calendar_event_master WHERE event_id = ?');
$stmt->execute([$event_id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

// Display the event data
echo '<h1>' . $event['title'] . '</h1>';
echo '<p><strong>Start Date:</strong> ' . $event['start'] . '</p>';
echo '<p><strong>End Date:</strong> ' . $event['end'] . '</p>';
// echo '<p><strong>Description:</strong> ' . $event['description'] . '</p>';
?>