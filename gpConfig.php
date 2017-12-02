<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '1014244611812-c9ggar6aofju7d8vq1btvt1sssdh3ga6.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'aEnFnwzTacjRltDbjCCLuYs2'; //Google client secret
$redirectURL = 'http://localhost/OneDrive/PHP/Project/Hatbazar/post_category_menu.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Hatbzar.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>