<!--/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/9/2015
 * Time: 4:09 PM
 */

-->


<?php
    require "connectDatabase.php";
    // SQL query
    if (isset( $_GET['questionId'])) {
        $questionId = $_GET['questionId'];
        $strSQL = "SELECT * FROM Questions WHERE questionId=$questionId";
        // Execute the query (the recordset $rs contains the result)
        $rs = mysql_query($strSQL);
        while($row = mysql_fetch_array($rs)) {
            // Write the value of the column FirstName (which is now in the array $row)
            $name = $row['name'];
            $title = $row['title'];
            $email = $row['email'];
            $content=$row['content'];
            $update=true;
        }
        mysql_close();
    }

    else{
        $name = "";
        $title = "";
        $email = "";
        $content="";
        $update=false;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Simple StackExchange</title>
    <script type = "text/javascript" src="validatorInputQuestionAnswer.js"></script>
</head>

<body>
    <div id="container">
        <div id="head">
            <span id="Judul">Simple StackExchange</span>
            <h2>What's your question?</h2>
        </div>


        <div id="body">
            <form name="myForm" action="addQuestionToDB.php" method="post" onsubmit="return validateFormQuestion()">
                <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"><br>
                <input type="text" name="email" placeholder="Email"value="<?php echo $email;?>"><br>
                <input type="text" name="questionTopic" placeholder="Question Topic" value="<?php echo $title;?>"><br>
                <textarea name="questionContent" placeholder="Content"><?php echo $content;?></textarea><br>
                <input class="submitButton" name= "submitButton" type="submit" value=<?php if($update){echo "Update";}else{echo "Post";}?> >
                <input type="hidden" name="update" value="<?php echo $update; ?>">
                <input type="hidden" name="questionId" value="<?php echo $questionId; ?>" >;
            </form>
        </div>

    </div>

</body>
</html>