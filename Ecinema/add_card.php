<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Add New Card' ;

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Check Subject and Message Input.
  if ( empty($_POST['full_name'] ) ) ; 
  if ( empty($_POST['card_number'] ) ) ;
  if ( empty($_POST['exp_month'] ) ) ;
  if ( empty($_POST['exp_year'] ) ) ;
  if ( empty($_POST['cvv'] ) ) ;
 

  # On success add post to payments table.
  if( !empty($_POST['full_name']) &&  !empty($_POST['card_number']) )
  {
    # Open database connection.
    require ( 'includes/connect_db.php' ) ;
  
    # Execute inserting into 'payments'table.
    $q = "INSERT INTO payments(user_id,full_name,card_number,exp_month,exp_year, cvv,reg_date) 
          VALUES ('{$_SESSION[user_id]}','{$_POST[full_name]}','{$_POST[card_number]}','{$_POST[exp_month]}','{$_POST[exp_year]}','{$_POST[cvv]}',NOW() )";
    $r = mysqli_query ( $con, $q ) ;

    # Report error on failure.
    if (mysqli_affected_rows($con) != 1) { echo '<p>Error</p>'.mysqli_error($con); } else { include('user_dash.php'); }
    
    # Close database connection.
    mysqli_close( $con ) ; 
    }
 } 
 



?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="stylesheet.css" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  