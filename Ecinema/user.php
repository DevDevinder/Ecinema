<?php # DISPLAY COMPLETE PRODUCTS PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Ecinema' ;
include ( 'includes/nav_logout.php' ) ;

# Open database connection.
require ( 'includes/connect_db.php' ) ;

# Display body section.
#include ( 'includes/body.html' ) ;
echo "{$_SESSION['first_name']} {$_SESSION['last_name']}";



?>