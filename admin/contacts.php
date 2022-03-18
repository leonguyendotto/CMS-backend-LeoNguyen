<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

if (isset($_GET['delete'])) {

  $query = 'DELETE FROM contacts
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);

  set_message('Contact has been deleted');

  header('Location: contacts.php');
  die();
}

$query = 'SELECT *
  FROM contacts
  ORDER BY time DESC';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Contacts</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">First Name</th>
    <th align="center">Last Name</th>
    <th align="center">Email address</th>
    <th align="center">Message</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['first']; ?></td>
      <td align="center"><?php echo $record['last']; ?></td>
      <td align="center"><?php echo $record['email']; ?></td>

      <td align="left"><?php echo $record['message']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities($record['time']); ?></td>


      <td align="center"><a href="contacts_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="contacts.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this contact?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="contacts_add.php"><i class="fas fa-plus-square"></i> Add Contact</a></p>


<?php

include('includes/footer.php');

?>