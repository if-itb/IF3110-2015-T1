<form id='questionform' method='post' action='?controller=questions&action=insert' >
	<p>
		Name						: <input type='text' name='authorname' />
	</p>
	<p>
		Email						: <input type='text' name='authoremail' />
	</p>
	<p>
		Question topic	: <input type='text' name='topic' />
	</p>

	<p>
		Question:<br/>
	 <textarea name="content" rows="7" cols="30"></textarea>
	</p>
	 <p>
	 <input type='submit'/>
	 </p>
</form>