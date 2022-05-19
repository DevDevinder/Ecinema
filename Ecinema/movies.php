<?php
	
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	# Retrieve movies from 'movie' database table.
	$q = "SELECT * FROM movie" ;
	$r = mysqli_query( $con, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
	# Display body section.

	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	echo '
			
			<img src='. $row['img'].' alt="..." class="img-thumbnail">';

    }

	# Close database connection.
	mysqli_close( $con) ; 
	}
	# Or display message.
	else { echo '<p>There are currently no movies showing.</p>' ; }
			
	?>	