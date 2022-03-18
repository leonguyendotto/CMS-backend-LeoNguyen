<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

if (isset($_POST['first'])) {

  if ($_POST['email'] and $_POST['message']) {

    $query = 'INSERT INTO contacts (
        first,
        last,
        email,
        message,
        time
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['first']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['last']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['email']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['message']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['time']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Contact has been added');
  }

  header('Location: contacts.php');
  die();
}

?>

<h2>Add Contacts</h2>

<form method="post">

  <label for="title">First Name:</label>
  <input type="text" name="first" id="first">

  <br>
  <label for="title">Last Name:</label>
  <input type="text" name="last" id="last">

  <br>
  <label for="title">Email address:</label>
  <input type="text" name="email" id="email">

  <br>

  <label for="message">Message:</label>
  <textarea type="text" name="message" id="message"></textarea>

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
  <input type="datetime-local" name="time" id="time">


  <br>

  <input type="submit" value="Add Contact">

</form>

<p><a href="contacts.php"><i class="fas fa-arrow-circle-left"></i> Return to Contact List</a></p>


<?php

include('includes/footer.php');

?>