<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '534476861338-hs7vu0uq7ah0n591emin358arj5b900a.apps.googleusercontent.com'; //Google client ID
$clientSecret = '0unRa6tSG53h_P4F3DApnOjM'; //Google client secret
$redirectURL = 'http://localhost/OneDrive/PHP/Project/Hatbazar/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>