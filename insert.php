<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php


        $connect = mysqli_connect("sql200.epizy.com", "epiz_29719843", "0C9Z6U1mXK6CE", "epiz_29719843_db_cms");
          
        if (isset($_POST['first'])) {

            if ($_POST['email'] and $_POST['message']) {
          
              $query = 'INSERT INTO contacts (
                  first,
                  last,
                  email,
                  message
                ) VALUES (
                   "' . mysqli_real_escape_string($connect, $_POST['first']) . '",
                   "' . mysqli_real_escape_string($connect, $_POST['last']) . '",
                   "' . mysqli_real_escape_string($connect, $_POST['email']) . '",
                   "' . mysqli_real_escape_string($connect, $_POST['message']) . '"
                )';

                if(mysqli_query($connect, $query)){
                        echo "<h3> Data stored in a database successfully." 
                            . " Please browse your localhost php my admin" 
                            . " to view the updated data </h3>"
                            . '<a href="index.php">Go Back To Homepage</a>';
                } else{
                    echo "ERROR: Hush! Sorry $query. " 
                        . mysqli_error($connect);
                }
            }
          
            // header('Location: insert.php');
            // // die();
          }
          
        // Close connection
        mysqli_close($connect);
        ?>
    </center>
</body>
  
</html>