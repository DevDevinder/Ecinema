<?php # DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'Register ' ;

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('includes/connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $con, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $con, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $con, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $con, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $con, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
  }
  
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";
    $r = @mysqli_query ( $con, $q ) ;
    if ($r)
    { echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>'; }
  
    # Close database connection.
    mysqli_close($con); 
	
    exit();
  }
  # Or report errors.
  else 
  {
    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p>';
    # Close database connection.
    mysqli_close( $con );
  }  
}
?>
<head>
<link rel="stylesheet" href="stylesheet.css" />
<title>Ecinema 2020 Register</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<nav>
<?php
include ('includes/nav.html');
?>
</nav>
<center>
<table>
<div class="register">
<form action="register.php" method="post">
		


		
		<h1>Register</h1>
		
		<tr>
		<th>
		<div class="form-group">
		<label for="first_name">First Name</label>
		</th>
		<th>
			<input type="text"  placeholder="First Name"name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
		</th>
		</div>
		</tr>
		
		<tr>
		<th>
		<div class="form-group">
		<label for="last_name">Last Name</label>
		</th>
		<th>
			<input type="text"  placeholder="Last Name"name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"> 
		</th>
		</div>
		</tr>
		
		<tr>
		<th>
		<div class="form-group">
		<label for="email">Email</label>
		</th>
		<th>
			<input type="text"  placeholder="email"name="email" size="20" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"> 
		</th>
		</div>
		</tr>
		
		<tr>
		<th>
		<div class="form-group">
		<label for="pass1">Password</label>
		</th>
		<th>
			<input type="password"  placeholder="Password"name="pass1" size="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"> 
		</th>
		</div>
		</tr>
		
		<tr>
		<th>
		<div class="form-group">
		<label for="pass2">Confirm Password</label>
		</th>
		<th>
			<input type="password"  placeholder="Password"name="pass2" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"> 
		</th>
		</div>
		</tr>
</table>		
		<input class="button" type="submit" value="Create Account Now">
</center>
				
</form>
</div>
</body>
			 