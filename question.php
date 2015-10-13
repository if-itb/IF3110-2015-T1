<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="container">
      <a href="index.php" class="home">Simple StackExchange</a>
      <h2>What's Your Question?</h2>
      <hr>
	<?php
		echo'
		  <input type="text" class="form" placeholder="Name">
		  <input type="text" class="form" placeholder="Email">
		  <input type="text" class="form" placeholder="Question Topic">
		  <textarea class="form" placeholder="Content" rows="5"></textarea>

		  <div class="text-right">
			<button class="btn" type="submit">Post</button>
		  </div>
		';
	?>
    </div>
  </body>
</html>