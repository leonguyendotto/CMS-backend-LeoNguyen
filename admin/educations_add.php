<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['degree'] ) )
{
  
  if( $_POST['degree'])
  {
    
    $query = 'INSERT INTO educations (
        degree,
        school,
        date,
        honors
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['degree'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['honors'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: educations.php' );
  die();
  
}

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="degree">Degree:</label>
  <input type="text" name="degree" id="degree">
    
  <br>
  
  <label for="school">School:</label>
  <input type="text" name="school" id="school">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
  
  <label for="honors">Honors:</label>
  <input type="text" name="honors" id="honors">
  
  <br>
  
  <input type="submit" value="Add Education">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>