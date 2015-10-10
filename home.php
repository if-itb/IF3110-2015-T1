<?php 
	require_once("database.php");
	
	if (isset($_POST['type'])) {
		if ($_POST['type'] == 'ask')
			postQuestion($_POST);
	}
	
	$q = '';
	if (isset($_GET['q']) && !is_null($_GET['q'])) {
		$q = $_GET['q'];
		$questions = getQuestions($_GET['q']);
	} else {
		$questions = getQuestions();
	}	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Simple StackExchange</title>
		<script type="text/javascript" src="main.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1 class="center">Simple StackExchange</h1>
			</div>
		
			<div class ="searchbar">
                <form action="/thread/search.php" action="GET">
                        <input type="text" class="form" style="width: 92%" name="search"> 
						<input type="submit" value="Search">
					    
                        
                            
                    
       
                </form>
			</div>
		
			<div class="center">
                <p>
                    Cannot find what you are looking for? <a href="ask.php">Ask Here</a>
                </p>
            </div>
		
			 <h2 class="underline">Recently Asked Question</h2>
			 
			<?php if (count($questions) == 0) echo "Be our first asker and you'll find the answer in no time !"?>
			<?php foreach ($questions as $question) : ?>
			<div class="question">
					<div class="row">
						<div class="vote">
							<div class="number"><?php echo $question['vote'] ?></div>
							<div class="flag">Votes</div>
						</div>
						<div class="answer">
							<div class="number"><?php echo $question['answer'] ?></div>
							<div class="flag">Answers</div>
						</div>
						<div class="content">
							<a href="question.php?id=<?php echo $question['question_id'] ?>">
							<?php echo $question['title'] ?><br>
							</a>

							<?php
							$content = $question['content'];
							if (strlen($content) > 100) {
								echo substr($question['content'], 0, 110) . '...';
							} else {
								echo $content;
							}
							?>
						</div>
					</div>
					
					<div class="controls"  align="right">
						asked by <span class="name"><font color="blue"><?php echo $question['name'] ?></font></span> |
						<span class="link_edit"><a class="link_edit" title="Click here to edit" href="ask.php?question_id=<?php echo $question['question_id']?>">edit</a></span> |
						<span class="link_delete"><a class="link_delete" title="Click here to delete" href="home.php" onclick="return deleteQuestion(<?php echo $question['question_id'] ?>);return false;">delete</a></span>
					</div>
					
			</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>
