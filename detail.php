<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

		<div class="container">
			<h1>Simple StackExchange</h1>

		
			<h3>The Question topic goes here </h3>
			<div class="votequest">
				<div class="vote-count">
					<div class="vote-up"></div>
					<div class="vote">2</div>
					<div class="vote-down"></div>
				</div>
				<div class="question">
					Lorem dolor sit amet, consectetur adipisicing elit. Dicta nulla laborum veritatis cupiditate, ab optio doloribus corrupti consectetur maiores ducimus assumenda repudiandae hic nam adipisci nostrum reiciendis sit? Facilis, blanditiis sequi quia nam nobis facere tempore perferendis ea. Aliquam delectus fugit quos laboriosam numquam tempora optio, hic maxime, magnam tempore quod iste odit dolorum doloribus quo dicta eveniet blanditiis quas corporis vero totam, consectetur recusandae! Eaque consequuntur repellat quam, ea dolorum voluptas illum minus sed nihil quibusdam sit eum, neque explicabo, velit, voluptatibus praesentium aliquam itaque perspiciatis fuga amet! Itaque facilis quaerat, voluptates modi nihil a enim at culpa voluptatem sapiente qui
				</div>
			</div>

			<div class="editor">
				asked by (username) at (datetime) | <span class="edit">edit</span>| <span class="delete">delete</span>			
			</div>
		</div>
    
    
    
    <div class="boxform">
		<h2>Your Answer</h2>	
		<form action="create.php" onsubmit="return validateForm()" method="post" name="form" >
			<input type="text" placeholder="Name" name="name" class="box">
			<br>
			<br>
			<input type="text" placeholder="Email" name="email" class="box">
			<br>
			<br>
			<textarea placeholder="Content" name="content" class="box" rows="5" cols="22"></textarea>
			<br>
			<button type="submit" class="posisipost"> Post </button>
		</form>
		</div>
</body>
</html>


