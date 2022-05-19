<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<nav>
 <?php
 include ('includes/nav.html');
 ?>
</nav>
<?php # DISPLAY COMPLETE LOGGED OUT PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Goodbye' ;
#include ( 'includes/login_head.html' ) ;

# Clear existing variables.
$_SESSION = array() ;
  
# Destroy the session.
session_destroy() ;

# Display body section.
echo '		<div class="container">
			<p class="display-1">Thanks for Visiting!!</p>
			<p class="display-1">SEE YOU NEXT TIME!</p>' ;

# Display footer section.
#include ( 'includes/reg_foot.html' ) ;

?>
</body>
