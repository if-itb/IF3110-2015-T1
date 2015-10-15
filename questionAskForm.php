<?php
	$questionAskForm = '<form name="questForm" onsubmit="return validateForm();" action="questionAskReq.php{isEdit}" method="post">
			<div class="form">
				<input class="formContent" type="text" name="name" placeholder="Name" value="{name}" >
			</div>
			<div class="form">  
		    	<input class="formContent" type="text" name="email" placeholder="Email" value="{email}">
		    </div>
		    <div class="form">
		    	<input class="formContent" type="text" name="topic" placeholder="Question Topic" value ="{topic}" size="159px">
		    </div>
		    <div class="textArea">
				<textarea class="formContent" name="content" placeholder="Contents" rows="10">{question}</textarea>
		    </div>
		    	<input class="button" type="submit" value="Submit"> 
		</form>';
?>