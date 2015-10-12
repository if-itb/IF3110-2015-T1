<form id='questionform' method='post' action='/controllers/question_controller.php' >
	<p>
		Name						: <input type='text' name='name' />
	</p>
	<p>
		Email						: <input type='text' name='email' />
	</p>
	<p>
		Question topic	: <input type='text' name='topic' />
	</p>

	<p>
		Comments:<br/>
	 <textarea name="question" rows="7" cols="30"></textarea>
	</p>
	 <p>
	 <input type='submit'/>
	 </p>
</form>