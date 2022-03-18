<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: educations.php' );
  die();
  
}

if( isset( $_POST['degree'] ) )
{
  
  if( $_POST['degree'])
  {
    
    $query = 'UPDATE educations SET
      degree = "'.mysqli_real_escape_string( $connect, $_POST['degree'] ).'",
      school = "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
      honors = "'.mysqli_real_escape_string( $connect, $_POST['honors'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been updated' );
    
  }

  header( 'Location: educations.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM educations
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: educations.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Education</h2>

<form method="post">
  
  <label for="degree">Degree:</label>
  <input type="text" name="degree" id="degree" value="<?php echo htmlentities( $record['degree'] ); ?>">
  
  <br>
  
  <label for="school">School:</label>
  <input type="text" name="school" id="school" value="<?php echo htmlentities( $record['school'] ); ?>">
    
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
    
  <br>
  
  <label for="honors">Honors:</label>
  <input type="text" name="honors" id="honors" value="<?php echo htmlentities( $record['honors'] ); ?>">

  <br>
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>