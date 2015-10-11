<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Simple Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/thescript.js"></script>
    <?php require_once('dbconnect.php'); ?>
</head>

<body>
	<div id="wrapper">
    
        <div id="header">
        
            <div id="title">
                <a href="index.php" class="center"><p>Simple StackExchange</p></a>
            </div>
        </div>
		<?php
			$id = $_GET['id'];
			$sql = "SELECT 
						question.id as id,
						question.name as name,
						question.email as email,
						question.qtopic as qtopic,
						question.content as content,
						question.vote as vote
					FROM question WHERE question.id='$id'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		?>
                    <div class="contents">
                        <div class="questioncontent">
                            <div class="qtitle">
                                <h1><p><?= $row["qtopic"]?></p></h1>
                            </div>
                            <hr>
                            <div class="thecontent">
                                <div class="votecontent">
                                    <div class="votebutton">
                                        <div class="upbutton" onclick="changeVote('up',<?=$row['id']?>,'q')">
                                            <img src="assets/upbutton.png" class="buttonimg">
                                        </div>
                                        <div class="votenumber" id="qvote<?=$row['id']?>">
                                            <?= $row["vote"] ?>
                                        </div>
                                        <div class="downbutton" onclick="changeVote('down',<?=$row['id']?>,'q')">
                                            <img src="assets/downbutton.png" class="buttonimg">
                                        </div>
                                    </div>             
                                </div>
                                <div class="qcontent">
                                    <?= $row["content"]?>
                                </div>
                                
                            </div>
                                <div class="qmetaq">
                                    Asked by  <span class="blue"><?= $row["email"]?></span> | <a href="askme.php?id=<?=$row['id']?>" class="orange">edit</a> | <a href="deletequestion.php?id=<?=$row['id']?>" class="delete red">delete</a> 
                                </div>
                       </div>
           	<?php 
				}
			} else {
				header("Location: index.php");
				exit;
			}
			?>
            <?php
				$sql= "SELECT
							answers.id as aid,
							answers.name as aname,
							answers.email as aemail,
							answers.a_content as acontent,
							answers.vote as avote
						FROM
							question INNER JOIN answers
						ON
							answers.qid=question.id
						WHERE
							question.id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows == 0) { 
					echo"<br>";
					echo"<br>";
					echo"<h2>There is no answer.. be the first to answer this question!</h2>";
				} else
				if ($result->num_rows > 0) {
				$result_list = array();
				while($row = $result->fetch_assoc()) {
					$result_list[] = $row;
				}
				?>
				<div class="qtitle">
					<h1><p><?= $result->num_rows ?> Answers</p></h1>
					<hr>
				</div>
                <?php
				foreach($result_list as $row) { ?>
                   <div class="answercontent">
                        <div class="thecontent">
                            <div class="votecontent">
                                <div class="votebutton">
                                    <div class="upbutton" onclick="changeVote('up',<?=$row['aid']?>,'a')">
                                        <img src="assets/upbutton.png" class="buttonimg">
                                    </div>
                                    <div class="votenumber" id="avote<?=$row['aid']?>">
                                        <?= $row['avote'] ?>
                                    </div>
                                    <div class="downbutton" onclick="changeVote('down',<?=$row['aid']?>,'a')">
                                        <img src="assets/downbutton.png" class="buttonimg">
                                    </div>
                                </div>             
                            </div>
                            <div class="qcontent">
                            	<?= $row['acontent'] ?>
                            </div>
                            
                        </div>
                            <div class="qmetaq">
                                Answered by  <?= $row['aemail'] ?>
                            </div>
                        <hr>
                   </div>
		   <?php
				}
			}
		   ?>
           <div class="answerForm">
           		<div class="atitle"><h1>Your Answer</h1></div>
               	<form name="qForm" action="insertanswer.php" onsubmit="return validateAForm()" method="post" id="questions_form">
                	<input type="hidden" name="qid" value="<?= $id ?>">
                    <div><input class="formBar" type="text" name="name" placeholder="    Name"></div>
                    <div><input class="formBar" type="text" name="email" placeholder="    E-mail"></div>
                    <div><textarea class="formBar" name="content" form="questions_form" rows="8" placeholder="    Content"></textarea></div>
                    <input id="postQuestion" type="submit" value="POST">
               	</form>
           </div>
        </div>

    </div>
    
</body>
</html>