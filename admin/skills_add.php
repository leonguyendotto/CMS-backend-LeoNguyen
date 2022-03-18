<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] )
  {
    
    $query = 'INSERT INTO skills (
        name,
        confidence
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['confidence'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Skill has been added' );
    
  }
  
  header( 'Location: skills.php' );
  die();
  
}

?>

<h2>Add Skill</h2>

<form method="post">
  
  <label for="title">Name:</label>
  <input type="text" name="name" id="name">
  
  <br>
  
  <label for="confidence">Confidence:</label>
  <input type="text" name="confidence" id="confidence">
  
  <br>
  
  <input type="submit" value="Add SKill">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skill List</a></p>


<?php

include( 'includes/footer.php' );

?>