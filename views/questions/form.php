<script type="text/javascript" src="assets/js/functions.js"></script>
<h1>
	What's your question?
</h1>
<form class='form' id='qform' method='post' action='?controller=questions&action=insert' >
	<input id='authorname' type='text' name='authorname' placeholder="Name" onblur="validate('authorname', this.value)"/><div id='authornamecheck'></div>
	<input id='authoremail' type='text' name='authoremail' placeholder="Email" onblur="validate('authoremail', this.value)"/><div id='authoremailcheck'></div>
	<input id='topic' type='text' name='topic' placeholder="Question topic" onblur="validate('topic', this.value)"/><div id='topiccheck'></div>
	<textarea id='content' name="content" rows="7" cols="30" placeholder="Content" onblur="validate('content', this.value)"></textarea><div id='contentcheck'></div>
	<input onclick="checkForm()" type='button' value='Post'/>
</form>