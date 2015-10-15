<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Simple Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<?php require_once('dbconnect.php'); ?>
</head>

<body>
	<div id="wrapper">
    
        <div id="header">
        
            <div id="title">
                <a href="index.php" class="center"><p>Simple StackExchange</p></a>
            </div>
            
            <div class="center">
            	<form id="form" name="search" action="searchq.php" method="GET">
                    <input autofocus type="text" name="search" id="search-bar" placeholder="Search question topic or content here..." >
                    <input id ="search-submit" type="submit" value="Search">
				</form>
            </div>
            
        </div>
        <div id="nav">
        	<div id="askme">
            	<p class="center">Cannot find what you are looking for? <a href="askme.php" class="orange">Ask Here</a></p>
            </div>
        </div>
        <div class="contents">
        	<h2><p>Recently Asked Questions</p></h2>
            <hr>
            <div id="questions">
                	<?php
						$sql = "SELECT
									question.id as id,
									question.name as name,
									question.email as email,
									question.qtopic as qtopic,
									question.content as content,
									question.vote as vote,
									count(answers.qid) as number_of_answer
								from question
								left join answers
								on (question.id = answers.qid)
								group by
									question.id,
									question.name,
									question.email,
									question.qtopic,
									question.content,
									question.vote
								order by
									question.id
								desc";
						$result = $conn->query($sql);
						if ($result->num_rows == 0){
							echo"<h2>There is no question.. be the first to ask!</h2>";
						} else
						if ($result->num_rows > 0) {
							$result_list = array();
							while($row = $result->fetch_assoc()) {
								$result_list[] = $row;
							}
							foreach($result_list as $row) {?>
								<div class="questionbox">
                                    <div class="voteanswer">
                                        <div class="qvote">
                                            <div class="counter">
                                                <?=$row["vote"]?>
                                            </div>
                                            <div class="word">
                                                Votes
                                            </div>
                                        </div>
                                        <div class="avote">
                                            <div class="counter">
                                                <?=$row["number_of_answer"]?>
                                            </div>
                                            <div class="word">
                                                Answers
                                            </div>
                                        </div>
                                    </div>
                                    <div class="qbox">
                                        <div class="qboxtopic">
                                            <a href="question.php?id=<?= $row['id']?>" class="qlink"><?=$row["qtopic"]?></a>
                                        </div>           
                                        <div class="qboxcontent">
                                            <?php 
												if (strlen($row['content'])>500){
													$stringcontent=substr($row['content'],0,500).". . .";
												} else {
													$stringcontent=$row['content'];
												}
												echo"$stringcontent";
											?>
                                        </div>     
                                        <div class="qmeta">
                                            Asked by  <span class="purple"><?=$row["email"]?></span> | <a href="askme.php?id=<?=$row['id']?>" class="orange">edit</a> | <a href="deletequestion.php?id=<?=$row['id']?>" class="delete red">delete</a> 
                                        </div>
                                    </div>
                                
							</div>
                            <hr>
							<?php
							}
						}					
						$conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
	<script src="js/thescript.js"></script>
</body>
</html>