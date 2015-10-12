<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
  	</head>
  	<body>
  		<div class="container">
			<h1 class="align-center margin-bot">Simple StackExchange</h1>
			<div class="row">
				<div class = "expanse80 expanseleft10">
					<div class="expanse80">
						<input type= "text" class ="form">
					</div>
					<div class=expanse10>
						<button class="button">Search</button>
					</div>
				</div>
			</div>
			<div class="align-center">
				<p>
					Cannot find what you are looking for? <a class = "text-link" href><orange>Ask here</orange></a>
				</p>
			</div>
			<h2>Recently Asked Question</h2>
			<?php
				echo'
					<div class="devider">
						<div class="row">
							<div class="expanse10">
								<h4 class="align-center">0</h4>
								<h4 class="align-center">Votes</h4>
							</div>
							<div class="expanse10">
								<h4 class="align-center">0</h4>
								<h4 class="align-center">Answers</h4>
							</div>
							<div class="expanse80">
								<p><b>
									<a class="text-link" href>Topic</a>
								</b></p>	
								<br>Content</br>
								<p class = "align-right footer">
									asked by <blue>email</blue> | <a class="text-link" href><orange>edit</orange></a> | <a class="text-link" href><red>delete</red></a>
								</p>
							</div>
						</div>
					</div>
				';
			?>
  	</body>
</html>