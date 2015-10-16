<?php

require 'query.php';

$vote = $_POST['vote'];
$obj = $_POST['obj'];
$id = $_POST['id'];

if($vote == 'up') {
  $addition = 1;
} else {
  $addition = -1;
}

updateVote($obj, $id, $addition);

echo getVote($obj, $id);
?>

<?php
  mysqli_close($conn);
 ?>
