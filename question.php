<!DOCTYPE html>
<html>
	<head>
        <script>
        function validateForm() {
            var x = document.forms["question"]["name"].value;
            if (x == null || x == "") {
                alert("Name must be filled out");
                return false;
            }
            var x = document.forms["question"]["email"].value;
            if (x == null || x == "") {
                alert("Email must be filled out");
                return false;
                
            }
            else{
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                if(!re.test(x)){
                    alert("Email Invalid");
                }
                return re.test(x);
            }
            var x = document.forms["question"]["topic"].value;
            if (x == null || x == "") {
                alert("Topic must be filled out");
                return false;
            }
            var x = document.forms["question"]["content"].value;
            if (x == null || x == "") {
                alert("Content must be filled out");
                return false;
            }
        }
        </script>
        
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
				<h2>What's your question?</h2>
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
                                <form name="question" action="index.php?id='.$_GET["id"]. '&rule=update" method="post" class="form" onsubmit="return validateForm()">
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
                    <form  name="question" action="index.php" method="post" class="form" onsubmit="return validateForm()">
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