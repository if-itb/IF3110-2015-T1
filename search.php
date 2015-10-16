<!--search.php-->

<?php 
	  if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['q'])){ 
	  $name=$_POST['q']; 
	  //connect  to the database 
	  include("A_config.php");
	  //-query  the database table 
	  $sql="SELECT  post_id, judul, konten FROM post WHERE judul LIKE '%" . $q .  "%' OR konten LIKE '%" . $q ."%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysql_query($sql); 
	  //-create  while loop and loop through result set 
	  while($row=mysql_fetch_array($result)){ 
	          $judul  =$row['judul']; 
	          $konten=$row['konten']; 
	          $post_id=$row['post_id']; 
	  //-display the result of the array 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"search.php?id=$post_id\">"   .$judul . " " . $konten .  "</a></li>\n"; 
	  echo "</ul>"; 
	  } 
	  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  } 
	  } 
	?> 
