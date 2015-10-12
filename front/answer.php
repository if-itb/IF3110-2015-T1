<!DOCTYPE HTML>
<html>
 	<head>
		<title>Stack Exchange</title>
		<link rel="stylesheet" type="text/css" href="../css/answer.css">
  	</head>
  	<body>
		<div class="container">
			<h1 class="align-center margin-bot">Simple StackExchange</h1>
			<?php
						echo'
							<h2>Topic</h2>
							<div class="devider">
								<div class="row">
									<div class="expanse10">
										<div id ="question-arrow-up"></div>
										<div class="align-center">
											<h2>0</h2>
										</div>
										<div id = "question-arrow-down"></div>
									</div>
									<div>
										<h1>Content</h1>
									</div>
									<p class="align-right footer">
										asked by <blue>email</blue> at 30 Januari | <a href><orange>edit</orange></a> | <a href><red>delete</red></a>
									</p>
								</div>
							</div>
							0 Answer
							<div class="devider">
								<div class="row">
									<div class="expanse10">
										<div class="arrow-up"></div>
										<div class="align-center">
											<h2>0</h2>
										</div>
										<div class="arrow-down"></div>
									</div>
									<div>
										Content
									</div>
									<p class="align-right footer">
										answered by <blue>email</blue> at 2 Februari
									</p>
								</div>
							</div>
						';
			?>
			<hr>
			<h1><grey>Your Answer<grey></h1>
		  	<?php
				echo'
					<form name="addAnswer">
						<input type="text" class="form" placeholder="Name" name="Name"><br>
						<input type="text" class="form" placeholder="Email" name="Email"> <br>
						<textarea class="form" placeholder="Content" rows="5" name="Content"></textarea>
						<div class="align-right">
							<button type="submit">Post</button>
						</div>
					</form>
				';
			?>
		</div>
  	</body>
</html>