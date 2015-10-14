<?php
  include 'query.php';
 ?>

<?php
  header('Location: index.php');
?>

<?php
  $q_id=$_GET['q_id'];
  delQuestion($q_id);
 ?>
