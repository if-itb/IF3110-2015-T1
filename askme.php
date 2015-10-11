<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Simple Stack Exchange : Ask Me</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
    <?php require_once('dbconnect.php'); ?>
</head>

<body>
	<div id="wrapper">
    
        <div id="header">
        
            <div id="title">
                <a href="index.php" class="center"><p>Simple StackExchange</p></a>
            </div>
        </div>
        <?php
			$id=-1;
			if ($_GET){
				$id = $_GET['id'];
			}
			if ($id !== -1){ 
				$sql = "SELECT 
							question.id as id,
							question.name as name,
							question.email as email,
							question.qtopic as qtopic,
							question.content as content,
							question.vote as vote
						FROM question WHERE question.id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$result_list = array();
					while($row = $result->fetch_assoc()) {
		?>   
                        <div class="contents">
                            <h1><p>What's your question?</p></h1>
                            <hr>
                            <div class="formArea">
                                <form name="qForm" action="updatequestion.php" onsubmit="return validateQForm()" method="post" id="questions_form">
                                	<input type="hidden" name="id" value="<?= $row["id"]?>">
                                    <div><input class="formBar" type="text" name="name" value="<?= $row["name"]?>"></div>
                                    <div><input class="formBar" type="text" name="email" value="<?= $row["email"]?>"></div>
                                    <div><input class="formBar" type="text" name="qtopic" value="<?= $row["qtopic"]?>"></div>
                                    <div><textarea class="formBar" name="content" form="questions_form" rows="8"><?= $row["content"]?></textarea></div>
                                    <input id="postQuestion" type="submit" value="EDIT">
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                }
            } else { ?>
                        <div class="contents">
                            <h1><p>What's your question?</p></h1>
                            <hr>
                            <div class="formArea">
                                <form name="qForm" action="insertquestion.php" onsubmit="return validateQForm()" method="post" id="questions_form">
                                    <div><input class="formBar" type="text" name="name" placeholder="    Name"></div>
                                    <div><input class="formBar" type="text" name="email" placeholder="    E-mail"></div>
                                    <div><input class="formBar" type="text" name="qtopic" placeholder="    Question Topic"></div>
                                    <div><textarea class="formBar" name="content" form="questions_form" rows="8" placeholder="    Content"></textarea></div>
                                    <input id="postQuestion" type="submit" value="POST">
                                </form>
                            </div>
                        </div>
            <?php
			}
			$conn->close();
			?>
    </div>
    <script src="js/thescript.js"></script>

</body>
</html>
