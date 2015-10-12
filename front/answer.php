<!DOCTYPE HTML>
<html>
 	<head>
		<title>Stack Exchange</title>
  	</head>
  	<body>
		<div>
			<h1>Simple StackExchange</h1>
			<?php
						echo'
							<h2>Topic</h2>
							<div>
								<h2>0</h2>
							</div>
							<div>
								<h1>Content</h1>
							</div>
							<p>
								asked by email at 30 Januari | <a href>edit</a> | <a href>delete</a>
							</p>
							<h2>0 Answer</h2>
							<div>
								<h2>0</hw>
							</div>
							<div>
								<h1>Content</h1>
							</div>
							<p>
								answered by email at 2 Februari
							</p>
						';
			?>
			<hr>
			<h1>Your Answer</h1>
		  	<?php
				echo'
					<form name="addAnswer">
						<input type="text" name="Name"><br>
						<input type="text" name="Email"> <br>
						<textarea name="Content"></textarea>
						<div>
							<button type="submit">Post</button>
						</div>
					</form>
				';
			?>
		</div>
  	</body>
</html>