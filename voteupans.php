<!DOCTYPE html>
<html>
    <head>
       <script src="votequestion.js"></script> 
        <link rel='stylesheet' href='style.css'/>
    </head>
    
    <body>
        <?php
        $con= mysqli_connect("localhost","root","","wbd");
					// Check connection
					if (mysqli_connect_errno())
					{
						 echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					else{
						
						$sql = "SELECT * FROM answer WHERE answer_id=".$_GET["id"];
						$result = $con->query($sql);

						if ($result->num_rows > 0) {	
							while($row = $result->fetch_assoc()) {
                                $votee=$row["vote"]+1;
                                    echo '<img src="up.png" alt="up" height="42" width="42" onclick="voteupans('.$row["answer_id"].')">
                                            <p>'. $votee.'</p>'.
                                        '<img src="down.png" alt="down" height="42" width="42"  onclick="votedownans('.$row["answer_id"].')"></div>';
							}
						}
                         mysqli_query($con,"UPDATE answer SET vote='$votee' WHERE answer_id='$_GET[id]'");
                }
        mysqli_close($con);
        ?>
    </body>
</html>