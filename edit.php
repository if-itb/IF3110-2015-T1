<?php 
    include 'index.php';
    $get = $_GET['id'];
    $id = (int) base64_decode($get);
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
            <div class="title">Simple StackExchange</div>
            <div class="subq black">What's your question?</div>
            <form class="formsearch createquestion" method="post" action="update.php?choice=1&id=<?php echo $get?>">
                <input type="text" id="createname" name="createname" value="<?php echo $row["user"]?>" />
                <input type="text" id="createemail" name="createemail" value="<?php echo $row["user_email"]?>" />
                <input type="text" id="createtopic" name="createtopic" value="<?php echo $row["topic"]?>" />
                <textarea type="text" id="createcontent" name="createcontent"><?php echo $row["content"]?></textarea>
                    <button type="submit" name="submit">Post</button>
            </form>
        </div>
        <?php }}?>
    </body>
</html>