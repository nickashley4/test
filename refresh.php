<?php
use League\OAuth2\Client\Provider\Google;

$clientID = '569107033722-1mh159gjug7hjtqi1eeaad7m9o6qostm.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://cgi.luddy.indiana.edu/~team48/home.php';

$provider = new Google([
    'clientId' => $clientID,
    'clientSecret' => $clientSecret,
    'redirectUri' => $redirectUri,
    'accessType'   => 'offline',
]);

if(!isset($_GET['code'])) {
    $authUrl = $provider->getAuthorizationUrl(['prompt' => 'consent', 'access_type' => 'offline']);
    header('Location: ' . $authUrl);
    exit;
} else {
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // persist the token in a database
    $refreshToken = $token->getRefreshToken();

    header('Location: manage.php');
    exit;
}
?>