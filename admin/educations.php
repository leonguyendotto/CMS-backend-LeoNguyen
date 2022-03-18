<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM educations
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Education has been deleted' );
  
  header( 'Location: educations.php' );
  die();
  
}

$query = 'SELECT *
  FROM educations
  ORDER BY degree DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Educations</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Degree</th>
    <th align="center">School</th>
    <th align="center">Date</th>
    <th align="center">Honors</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo $record['degree']; ?></small>
      </td>
      <td align="center"><?php echo $record['school']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['date'] ); ?></td>
      <td align="center"><?php echo $record['honors']; ?></td>
      <td align="center"><a href="educations_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="educations.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="educations_add.php"><i class="fas fa-plus-square"></i> Add Educations</a></p>


<?php

include( 'includes/footer.php' );

?>