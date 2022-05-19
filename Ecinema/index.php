<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />
	
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
    <title>Home Page</title>
	
	<script>
function showMovie(str) {
    if (str == "") {
".innerHTML"
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getmovie.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>	

<body>
	<nav>
 <?php
 session_start() ;
// check if session exists?
  if(!empty($_SESSION))
  {
    include ( 'includes/nav_logout.php' );
  }
  else
  {
     include ('includes/nav.html');
  }

 
 ?>
	</nav>
	
	<div id="txtHint">  </div>
	<div class="container">
	<?php
	
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	# Retrieve movies from 'movie' database table.
	$q = "SELECT * FROM movie" ;
	$r = mysqli_query( $con, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
	# Display body section.
	echo '<h1 class="display-4">Movies</h1>
			<div class="row">
				
				';

	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		
		
		if(!empty($_SESSION))
		{
			echo '
	
				<div class="col-sm-6 col-md-4">	<div class="card" style="width: 14rem;">
					 <div class="card-body">
						<img src='. $row['img'].' alt="..." class="img-thumbnail">
						 <a href="added.php?id='.$row['id'].'" class="btn btn-primary btn-block">Book Now</a>
					</div>
						</div>
					</div>
			';
		}
	else
		{
			echo '
	
				<div class="col-sm-6 col-md-4">	<div class="card" style="width: 14rem;">
					 <div class="card-body">
						<img src='. $row['img'].' alt="..." class="img-thumbnail">
						 <a href="login.php" class="btn btn-primary btn-block">Book Now</a>
					</div>
						</div>
					</div>
			';
		}	
	}
	echo '</div>';
	
	
	# Close database connection.
	mysqli_close( $con) ; 
	}
	# Or display message.
	else { echo '<p>There are currently no movies showing.</p>' ; }
			
	?>	
</div>
        <h1>                             COMING SOON</h1>
    <p><center>CALL</p></center>
    <p><center> <img src="img/CALL.jpg" alt="venom" width="500" height="333"></p></center>
    
   <p><center>THE LAST BLOCKBUSTER</p></center>
   <center>  <img src="img/BLOCKBUST.jpg" alt="venom" width="500" height="333"></p></center>
 
    <p><center>FATMAN</p></center>
   <p><center> <img src="img/FATMAN.jpg" alt="venom" width="500" height="333"></p></center>
    
   
    
       
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
	
	
	
	
  </body>
</html>