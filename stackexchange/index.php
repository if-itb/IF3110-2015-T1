<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple StackExchange</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php
	$connect = mysql_connect("localhost","root","") or die ("Connection Error");
	$selectdb = mysql_select_db("stackexchange", $connect);
?>

<body>
	<a href="index.php"><h1> Simple StackExchange </h1></a>
	<div id="search-box"> 
		<form class="search" action="result.php" method="get">
			<input type="text" name="q" required class="search-box">
			<button type="submit"> Search </button>
		</form>
		Cannot find what you are looking for? <a href="ask.php">Ask here </a>
    </div>

	<div id="container">
    	<div class="container-title">
			Recently Asked Questions
        </div>
        <?php
		$query = 'SELECT * FROM `question` ORDER BY `timestamp` DESC limit 10';
		$data = mysql_query($query,$connect);
		if ($data){
		while($row = mysql_fetch_array($data)){
        echo '<table class=questions-table>';
			echo '<tr>';
            	echo '<td rowspan="3" class="td-vote-answer">';
                    echo ('<b>'.$row[6].'</b><br>Votes');
                echo '</td>';
                echo '<td rowspan="3" class="td-vote-answer">';
                    echo '<b>0</b><br>Answers';
                echo '</td>';
                echo '<td class="td-topic">';
                    echo '<a href="question.php?id='.$row[0].'">';
					echo $row[4];
					echo '</a>';
                echo '</td>';
                echo '</tr>';
				
				echo '<tr>';
                echo '<td class="td-content">';
					if(strlen($row[5])>130){
    					$content=substr($row[5],0,130).'...';
					}
					else {
						$content = substr($row[5],0);
					}
                    echo $content;
                echo '</td>';
                echo '</tr>';
				
                echo '<tr>';
                echo '<td class="td-detail">';
                    echo ('asked by <span class="username">'.$row[2].'</span>');
                echo '</td>';
                echo '</tr>';
            echo '</table>';
		}
		}
        ?>

</div>    
</body>

</html>