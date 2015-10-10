<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='style.css'/>
	</head>
	<body>
		<div class="header">
			<div class="container">
				<p><a href="index.php">Simple StackExchange</a></p> 
			</div>
		</div>
		
		<div class="main">
			<div class="container">
				<h1>What's your question?</h1>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
                    
                    $con = mysqli_connect("localhost","root","","wbd");
					// Check connection
					if (mysqli_connect_errno())
					{
						 echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					else{
					
						$sql = "SELECT * FROM question WHERE question_id=".$_GET["id"];
						$result = $con->query($sql);

						if ($result->num_rows > 0) {	
							while($row = $result->fetch_assoc()) {	
                                 echo '
                                <form action="index.php?id='.$_GET["id"]. '&rule=update" method="post" class="form">
                                    <input type="text" name="name" placeholder="Name" value="'.$row["name"].'"><br>
                                    <input type="text" name="email" placeholder="Email" value="'.$row["email"].'"><br>
                                    <input type="text" name="topic" placeholder="Question Topic" value="'.$row["questiontopic"].'"><br>
                                    <textarea name="content" placeholder="Content">'.$row["content"].'</textarea>
                                    <input type="submit" value="Post">
                                </form>';
							}
						}
                    }
                    
                   
                }
                else{
                    echo '
                    <form action="index.php" method="post" class="form">
                        <input type="text" name="name" placeholder="Name"><br>
                        <input type="text" name="email" placeholder="Email"><br>
                        <input type="text" name="topic" placeholder="Question Topic"><br>
                        <textarea name="content" placeholder="Content"></textarea>
                        <input type="submit" value="Post" >
                    </form>';
                }
                ?>
			</div>
		</div>
	
	</body>
</html>