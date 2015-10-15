<?php
    $queryString = '<form action="question_update.php?no_question={{no_question}}" onsubmit="return validateForm()" method="post" name="form" >
			<br>
			<input type="text" placeholder="Name" name="name" class="box" value="{{name}}">
			<br>
			<br>
			<input type="text" placeholder="Email" name="email" class="box" value="{{email}}">
			<br>
			<br>
			<input type="text" placeholder="Topic" name="topic" class="box" value="{{topic}}">
			<br>
			<br>
			<textarea placeholder="Content" name="content" class="box" rows="5" cols="22">{{content}}</textarea>
			<br>
			<button type="submit" class="posisipost">Post </button>
            
		</form>';
?>