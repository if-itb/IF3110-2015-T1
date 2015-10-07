<h2><?=$question['topic']?></h2>
<hr/>

<div id="question-detail">
	<div id="vote">
		<div><div id="vote-up" class="arrow arrow-up"></div></div>
		<div id="vote-count"><?=$question['voters']?></div>
		<div><div id="vote-down" class="arrow arrow-down"></div></div>
	</div>

	<div id="content"><pre><?=$question['content']?></pre></div>
	<div id="footer">Asked by <?=$question['name']?> at <?=$question['timestamp']?> | <a href='/index.php/questions/edit/<?=$question['id']?>'>edit</a> | <a href='/index.php/questions/delete/<?=$question['id']?>'>delete</a> </div>
</div>

<h2><?=$question['answers']?> Answers</h2>
<hr/>

<?php
	foreach ($answersArray as $answer) {

		echo '<div id="question-detail">';
		echo '  <div id="vote">';
		echo '    <div><div data-id="'.$answer['id'].'" class="answer-vote-up arrow arrow-up"></div></div>';
		echo '    <div id="answers-vote-count-'.$answer['id'].'">'.$answer['voters'].'</div>';
		echo '    <div><div data-id="'.$answer['id'].'" class="answer-vote-down arrow arrow-down"></div></div>';
		echo '  </div>';
		echo '  <div id="content"><pre>'.$answer['content'].'</pre></div>';
		echo '  <div id="footer">Answered by '.$answer['name'].' at '.$answer['timestamp'].'</div>';
		echo '</div>';
		echo '<hr/>';

	}
?>

<h2>Your Answer</h2>

<form class="answer" action="<?=$actionURL?>" method="post" onsubmit="return false || validate(this)">
<input type="hidden" name="questionID" value="<?=$question['id']?>">
<input type="text" name="name" placeholder="Name">
<input data-type="email" name="email" placeholder="Email">
<textarea name="content" placeholder="Content" rows="8"></textarea>
<input type="submit" name="action" value="submit">
</form>

<script type="text/javascript">
	
	_(function(){

		_("#vote-up").click(function(){
			_.ajax.post("/index.php/questions/voteup", {"id":"<?=$question['id']?>"}, function(response){
				var status = JSON.parse(response);
				_("#vote-count").html(status.voters);
			}, 1);
		});

		_("#vote-down").click(function(){
			_.ajax.post("/index.php/questions/votedown", {"id":"<?=$question['id']?>"}, function(response){
				var status = JSON.parse(response);
				_("#vote-count").html(status.voters);
			}, 1);
		});

		_(".answer-vote-up").click(function(elmt){
			id = elmt.prop("data-id");
			_.ajax.post("/index.php/answers/voteup", {"id":id}, function(response){
				var status = JSON.parse(response);
				_("#answers-vote-count-"+id).html(status.voters);
			}, 1);
		});

		_(".answer-vote-down").click(function(elmt){
			id = elmt.prop("data-id");
			_.ajax.post("/index.php/answers/votedown", {"id":id}, function(response){
				var status = JSON.parse(response);
				_("#answers-vote-count-"+id).html(status.voters);
			}, 1);
		});

	});

</script>