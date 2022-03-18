<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

if (!isset($_GET['id'])) {

  header('Location: contacts.php');
  die();
}

if (isset($_POST['first'])) {

  if ($_POST['email'] and $_POST['message']) {

    $query = 'UPDATE contacts SET
      first = "' . mysqli_real_escape_string($connect, $_POST['first']) . '",
      last = "' . mysqli_real_escape_string($connect, $_POST['last']) . '",
      email = "' . mysqli_real_escape_string($connect, $_POST['email']) . '",
      message = "' . mysqli_real_escape_string($connect, $_POST['message']) . '",
      time = "' . mysqli_real_escape_string($connect, $_POST['time']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Contact has been updated');
  }

  header('Location: contacts.php');
  die();
}


if (isset($_GET['id'])) {

  $query = 'SELECT *
    FROM contacts
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (!mysqli_num_rows($result)) {

    header('Location: contacts.php');
    die();
  }

  $record = mysqli_fetch_assoc($result);
}

?>

<h2>Edit Contact</h2>

<form method="post">

  <label for="first">First Name:</label>
  <input type="text" name="first" id="first" value="<?php echo htmlentities($record['first']); ?>">

  <br>
  <label for="last">Last Name:</label>
  <input type="text" name="last" id="last" value="<?php echo htmlentities($record['last']); ?>">

  <br>
  <label for="email">Email address:</label>
  <input type="text" name="email" id="email" value="<?php echo htmlentities($record['email']); ?>">

  <br>
  <label for="message">Message:</label>
  <textarea type="text" name="message" id="message"><?php echo htmlentities($record['message']); ?></textarea>

  <script>
    ClassicEditor
      .create(document.querySelector('#message'))
      .then(editor => {
        console.log(editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script>

  <br>


  <label for="time">Date:</label>
  <input type="datetime-local" name="time" id="time" value="<?php echo htmlentities($record['time']); ?>">

  <br>

  <input type="submit" value="Edit Contact">

</form>

<p><a href="contacts.php"><i class="fas fa-arrow-circle-left"></i> Return to Contact List</a></p>


<?php

include('includes/footer.php');

?>