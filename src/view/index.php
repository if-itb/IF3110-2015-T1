<!DOCTYPE html>
<html>
  <head>
    <title>Overflow48</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

  </head>
  <body>
    <h1>OVERFLOW48</h1>
    <p>Cannot find what you are looking for? Ask here.</p>

    <h2>Recently Asked Questions</h2>
    <hr/>
    <?php
      
      require "../conf.php";
      $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
      if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
    ?>

  </body>
</html>