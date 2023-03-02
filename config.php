<?php
require_once('vendor/autoload.php');

use League\OAuth2\Client\Provider\Google;

session_start();

$clientID = '569107033722-1mh159gjug7hjtqi1eeaad7m9o6qostm.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://cgi.luddy.indiana.edu/~team48/home.php';

$provider = new Google([
    'clientId' => $clientID,
    'clientSecret' => $clientSecret,
    'redirectUri' => $redirectUri,
]);

if (!isset($_SESSION['access_token'])) {
    // Redirect the user to the login page if they are not logged in
    header('Location: login.php');
    exit();
}

if (!empty($_GET['error'])) {

    // Got an error, probably user denied access
    exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));

} elseif (empty($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authorizationUrl = $provider->getAuthorizationUrl([
        'scope' => [
            Google::SCOPE_EMAIL,
            Google::SCOPE_PROFILE,
        ],
    ]);

    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authorizationUrl);
    exit;

} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    // State is invalid, possible CSRF attack in progress
    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the owner details
        $ownerDetails = $provider->getResourceOwner($token, $token->getValues()['id_token']['sub'], ['userinfo.email']);

        // Use these details to create a new profile
        printf('Hello %s!', $ownerDetails->getFirstName());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Something went wrong: ' . $e->getMessage());

    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken();

    // Use this to get a new access token if the old one expires
    echo $token->getRefreshToken();

    // Unix timestamp at which the access token expires
    echo $token->getExpires();
}
?>