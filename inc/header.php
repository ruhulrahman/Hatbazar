<?php
    include_once("lib/Session.php");
    

	include_once("helpers/Format.php");
	include_once("lib/Database.php");

	spl_autoload_register(function($class_name){
		include_once "classes/".$class_name.".php";
	});

	$db = new Database();
	$fm = new Format();
	$cat = new Category();
	$pd = new Product();
	$usr = new Users();
	$brand = new Brand();
	$st = new Site();
	$lcn = new Location();
	$ec = new Electronics();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

	<?php
//Include GP config file && User class

//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    error_reporting(0);
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	

	//some variable declaration 
	global $user_id, $pro_pic, $name, $email, $gender, $locale, $googleId, $logout, $login;
	//Render facebook profile data

    if(!empty($userData)){
        $output = '<h1>Google+ Profile Details </h1>';
        $user_id .= $userData['id'];
        $pro_pic .= '<img src="'.$userData['picture'].'">';
        $googleId .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $name .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $email .= '<br/>Email : ' . $userData['email'];
        $gender .= '<br/>Gender : ' . $userData['gender'];
        $locale .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $logout .= '<br/>Logout from <a href="logout.php">Google</a>'; 
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$login = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="gl"><i class="fa fa-google-plus google"></i>Login With Google</a>';
}



//User table user id
if(isset($userData['id'])){
	$user_id = $userData['id'];
}
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
    <?php
        $sites = $st->getSiteDetails();
        if($sites){
            while ($result = $sites->fetch_assoc()) { ?>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $result['site_title'];?></title>
        <meta name="description" content="<?php echo $result['site_desc'];?>">
		<meta name="keywords" content="<?php echo $result['keywords'];?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="<?php echo $result['author'];?>">

    <?php } } ?>

    
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <script src="ajax/ajax.js"></script>






    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
	
	<header class="header_area">
		<div class="container-fluit">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index.php"><i class="fa fa-eercast fa-2x" aria-hidden="true"></i></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
			  	<?php
			  		if(isset($googleId)){ ?>
					<a class="nav-link" href="post_category_menu.php">Add Post</a>
			  	<?php }else{ ?>			  	
					<a class="nav-link" href="login.php">Add Post</a>
			  	<?php } ?>
			  </li>

			  <li class="nav-item">
				<a class="nav-link" href="view_posts.php">View All Add Posts</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link" href="view_post_by_location.php">View Post Location</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link" href="view_new_elements.php">New Elements</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link" href="used_elements.php">Used Elements</a>
			  </li>

			  <li class="nav-item">
			  	<?php
			  		if(isset($googleId)){ ?>
				<a class="nav-link" href="my_post.php">My Post</a>
				<?php }?>
			  </li>
			</ul>
			
			  <div class="pull-right loginDiv">
			  	<?php
			  		global $search;
			  		if(!isset($googleId)){ ?>
					<a class="nav-link" href="login.php">Login</a>
			  	<?php } ?>
				
			  </div>
			<form class="form-inline my-2 my-lg-0" action="view_posts.php" method="post">
			  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" value="<?php echo $search; ?>">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" id="search_btn">Search</button>
			</form>			

			  <div class="profilePic">
				<a class="nav-link" href="logout.php">
					<span style="width: 10px; height: 10px;">
					<?php 
						if(isset($pro_pic)){
							echo $pro_pic;
						}
					?></span>
				</a>
			  </div>
		  </div>
		</nav>
		</div>
	</header>