<?php
include("index.php"); //config.php is added to get access to database connection
function getAllVotes($id,$tablename)
 {
 /**
 Returns an array whose first element is votes_up and the second one is votes_down
 **/
 $votes = array();
 $q = "SELECT * FROM $tablename WHERE id = $id";
 $r = mysql_query($q);
 if(mysql_num_rows($r)==1)//id found in the table
  {
  $row = mysql_fetch_assoc($r);
  $votes[0] = $row['vote'];
  }
 return $votes;
 }
?>