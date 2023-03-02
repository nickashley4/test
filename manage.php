<?php
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Grant\RefreshToken;

$clientID = '569107033722-1mh159gjug7hjtqi1eeaad7m9o6qostm.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://cgi.luddy.indiana.edu/~team48/home.php';

session_start();

$refreshToken = $_SESSION['refreshToken'];

$provider = new Google([
    'clientId' => $clientID,
    'clientSecret' => $clientSecret,
    'redirectUri' => $redirectUri,
]);

$grant = new RefreshToken();
$token = $provider->getAccessToken($grant, ['refresh_token' => $refreshToken]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
</head>
<body>
    <h1>Welcome to the manage page</h1>
    <p>You are logged in with Google.</p>

    <a href="logout.php">Logout</a>
</body>
</html>