<html>
<head>
	<title>Simple StackExchange</title>
	<?php include('backend/question.php');
	include('backend/answer.php');?>
</head>
<body>
	<div class="big_title">Simple StackExchange</div><br>

	<div class="title"><?php echo $question['topic'];?></div>
	<div class="divider"><div>
	<div class="content">
		<div class="votes"></div>
		<div class=""><?php echo $question['content'];?></div>
	</div>
	<div class="details">asked by <?php echo $question['name'];?> at <?php echo $question['timestamp'];?> | <?php echo '<a href="edit.php?id='.$question['id'].'">edit</a> | <a href="javascript:confirmDelete('.$question['id'].')">delete</a>';?>

	<div class="answer">
		<div class="title"><?php echo $question['count'];?> Answer</div>
		<?php while($row = mysqli_fetch_array($result_answer)) {?>
			<div class="divider"></div>
			<div class="answer">
				<div class="content">
					<div class="votes" id="votes<?php echo $row['id_answer'];?>"></div>
					<div class=""><?php echo $row['content'];?></div>
				</div>
				<div class="details">answered by <?php echo $row['name'];?> at <?php echo $row['timestamp'];?></div>
			</div>
		<?php }?>
		<div id="ajax_answer"></div>
	</div>

	Your Answer
	<form method="post">
		<input type="text" name="name" id="name" placeholder="Name"><br>
		<input type="text" name="email" id="email" placeholder="Email"><br>
		<input type="text" name="content" id="content" placeholder="Content" rows="5"><br>
		<button type="submit" onclick="javascript:showComment()">Post</button>
	</form>
</body>

<script type="text/javascript">
    function showComment() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var content = document.getElementById('content').value;
        var id = <?php echo $id ?>;
        if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("ajax_answer").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","ajax_answer.php",true);
        xmlhttp.send();
    }
</script>