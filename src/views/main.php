<div id="search">

	<form action="/index.php/questions/search" method="get">
		<input type="search" name="q" id="q" placeholder="Search" value="<?=isset($keyword)?$keyword:''?>">
		<input type="submit" value="Search">
	</form>

	Cannot find what are you looking for? <a href="/index.php/questions/ask">Ask here</a>
</div>


<h2><?=$subHeader?></h2>

<?php
	foreach ($listQuestions as $questions) {
		echo("<div class='question'>");
		echo("<table width='100%'>");

		echo("<tr>");
			echo("<td width='7%'>{$questions['voters']}</td>");
			echo("<td width='7%'>{$questions['answers']}</td>");
			echo("<td class='question-topic' width='56%' rowspan='2'><a href='/index.php/questions/detail/{$questions['id']}'>{$questions['topic']}</a></td><td></td>");
		echo("</tr>");

		echo("<tr>");
			echo("<td width='7%'>Voters</td>");
			echo("<td width='7%'>Answers</td>");
			echo("<td width='30%'>Asked by {$questions['name']} | <a href='/index.php/questions/edit/{$questions['id']}'>edit</a> | <a href='javascript:deleteQuestion({$questions['id']})'>delete</a> </td>");
		echo("</tr>");

		//var_dump($questions);
		echo("</table>");
		echo("</div>");
	}
?>


<script type="text/javascript">
	
	function deleteQuestion(id) {
		if (confirm("Apakah Anda yakin?")){
			window.location.href = "/index.php/questions/delete/" + id;
		}
	}

</script>