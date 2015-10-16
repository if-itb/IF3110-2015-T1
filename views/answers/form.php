<script type="text/javascript" src="assets/js/functions.js"></script>

<h2>
	Your Answer
</h2>
<form class='form' id='qform' method='post' action='?controller=answers&action=insert&qid=<?php echo $_GET['qid'] ?>'>
	<input id='authorname' type='text' name='authorname' placeholder="Name" onblur="validate('authorname', this.value)"/><div id='authornamecheck'></div>
	<input id='authoremail' type='text' name='authoremail' placeholder="Email" onblur="validate('authoremail', this.value)"/><div id='authoremailcheck'></div>
	<textarea id='content' name="content" rows="7" cols="30" placeholder="Content" onblur="validate('content', this.value)"></textarea><div id='contentcheck'></div>
	<input onclick="checkForm('answer')" type='button' value='Post'/>
</form>