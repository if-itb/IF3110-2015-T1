<!DOCTYPE html>
<html>
<body>

<?php
header("Content-type:application/pdf");
$link = mysqli_connect("127.0.0.1","my_user","my_password", "my_db" );

if (!$link){
	echo "Error: unable to connect to database";
	exit;
}

mysqli_close($link);

function display(){
	// memilih semua child dari parent

	if ($ParentCategoryID == ''){
		$Result = mysql_query('SELECT * FROM categories');
	}
}
?>

</body>
</html>