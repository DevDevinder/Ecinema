<?php # PROCESS MESSAGE POST.

# Access session.
session_start();

# Make load function available.
require ( 'login_tools.php' ) ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { load() ; }

# Set page title and display header section.
$page_title = 'Movie Reviews' ;
include('includes/nav_logout.php');

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  # Check Subject and Message Input.
  if ( empty($_POST['mov_title'] ) ) { echo '<p>Please enter a movie title for this post.</p>'; }
  if ( empty($_POST['message'] ) ) { echo '<p>Please enter a comment for this post.</p>'; }
 

  # On success add post to mov_rev database.
  if( !empty($_POST['mov_title']) &&  !empty($_POST['message']) )
  {
    # Open database connection.
    require ( 'includes/connect_db.php' ) ;
  
    # Execute inserting into 'forum' database table.
    $q = "INSERT INTO mov_rev(first_name,last_name,mov_title,rate, message,post_date) 
          VALUES ('{$_SESSION[first_name]}','{$_SESSION[last_name]}','{$_POST[mov_title]}','{$_POST[rate]}','{$_POST[message]}',NOW() )";
    $r = mysqli_query ( $con, $q ) ;

    # Report error on failure.
    if (mysqli_affected_rows($con) != 1) { echo '<p>Error</p>'.mysqli_error($con); } else { load('review.php'); }
    
    # Close database connection.
    mysqli_close( $con ) ; 
    }
 } 
 
# Create a hyperlink back to the forum page.
echo '<a href="review.php"><button type="button" class="btn btn-secondary" role="button" ">Movie Review</button></a>' ;
?>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>