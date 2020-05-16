<?php 
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	# Start session
    session_start();
	
	# Database connection
	include ("dbconn.php");
	
	# Variables MUST BE INTEGERS
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	
	# Classes & Functions
    include_once("functions.php");
	
print '
<!DOCTYPE html>
<html>
	<head>
		
		<!-- CSS -->
		<link rel="stylesheet" href="style.css">
		<!-- End CSS -->
		<!-- meta elements -->
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
        <meta charset="UTF-8">
        <meta name="description" content="news">
        <meta name="keywords" content="news, best news, super best news, ultra best news">
		
		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="news">
		<meta itemprop="description" content="news">
		
		<!-- Open Graph data -->
		<meta property="og:title" content="home">
		<meta property="og:type" content="news">
		<meta property="og:url" content="news.com">
		<meta property="og:description" content="Ultra best news">
		<meta property="article:tag"  content="news, best news, super best news, ultra best news">
		
		<!-- Twitter Card data -->
		<meta name="twitter:title" content="home">
		<meta name="twitter:description" content="news">
		
        <meta name="author" content="mdasovic">
		<!-- favicon meta -->
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<!-- end favicon meta -->
		<!-- end meta elements -->
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
		<!-- End Google Fonts -->
		<title>news</title>
	</head>
<body>
	<header>
		<div';

		 if ($menu > 1) { print ' class="hero-subimage"'; } else { print ' class="hero-image"'; }  print '></div>
		<nav>';
			include("menu.php");
		print '</nav>
	</header>
	<main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
	
	# Homepage
	if (!isset($menu) || $menu == 1) { include("home.php"); }
	
	# News
	else if ($menu == 2) { include("news.php"); }
	
	# Contact
	else if ($menu == 3) { include("contact.php"); }
	
	# About us
	else if ($menu == 4) { include("about-us.php"); }
	
	# Register
	else if ($menu == 5) { include("register.php"); }
	
	# Signin
	else if ($menu == 6) { include("signin.php"); }
	
	# Admin webpage
	else if ($menu == 7) { include("admin.php"); }
	
	print '
	</main>
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Mario Dasović. <a href="https://github.com/"><img src="img/git.png" title="Github" alt="Github"></a></p>
	</footer>
</body>
</html>';
?>
