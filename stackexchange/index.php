<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Stack Exchange</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php
	$connect = mysql_connect("localhost","root","") or die ("Connection Error");
	$selectdb = mysql_select_db("stackexchange", $connect);
?>

<body>
	<h1> Simple Stack Exchange </h1>    
<form class="search" action="result.php" method="get">
		<input type="text" name="q" placeholder="Looking for something?" required class="search-box">
		<button type="submit"> Search </button>
	</form>
	Cannot find what you are looking for? <a href="ask.php">Ask here </a>

	<div id="container">
		<b>Recently asked questions</b>
        
        <?php
		$data = mysql_query("SELECT * FROM `question` ORDER BY `timestamp` DESC limit 5" ,$connect);
		
		while($row = mysql_fetch_array($data, MYSQL_NUM)){
        echo '<table class=questions-table>';
                echo '<tr>';
                echo '<td rowspan="2" class="td-vote-answer">';
                    echo ($row[6].'<br>votes');
                echo '</td>';
                    echo '<td rowspan="2" class="td-icon">';
                    echo '<b>0</b><br>answers';
                echo '</td>';
                echo '<td class="td-topic">';
                    echo $row[4];
                    
                echo '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td class="td-detail">';
                    echo ('Asked by '.$row[2]);
                    //echo $result[$i]->directory;
                echo '</td>';
                echo '</tr>';
            echo '</table>';
		}
        ?>
<table class="questions-table">
<tr>
<td></td>
</tr>
</table>
</div>
    
    
</body>
</html>