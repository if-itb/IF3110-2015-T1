<?php 
    include 'index.php';
    if (isset($_POST["id"])) $get = $_POST["id"];
    $id = $get;
    $sql = "SELECT id,topic,content,user,user_email FROM question WHERE id=$id";
    $result = $con->query($sql);
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()){
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web for Questions and Answers">
        <meta name="author" content="13513095 Fitra Rahmamuliani">
        <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Simple Stack Exchange</title>
    </head>
    <body>
        <div class="container">
            <div class="title"><a href="list.php">Simple StackExchange</a></div>
            <div class="subq black">What's your question?</div>
            <form class="formsearch createquestion" method="post" action="update.php">
                <input type="text" id="createname" name="createname" value="<?php echo $row["user"];?>" />
                <input type="text" id="createemail" name="createemail" value="<?php echo $row["user_email"];?>" />
                <input type="text" id="createtopic" name="createtopic" value="<?php echo $row["topic"];?>" />
                <textarea type="text" id="createcontent" name="createcontent"><?php echo $row["content"];?></textarea>
                <input type="hidden" id="choice" name="choice" value="1"/>
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>"/>
                <button type="submit" name="submit">Post</button>
            </form>
        </div>
        <?php }}?>
    </body>
</html>