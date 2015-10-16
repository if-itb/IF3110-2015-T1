<?php 
    include 'index.php';
    $get = $_GET['topic'];
    $id = (int) base64_decode($get);
    $sql1 = "SELECT q.id,q.user_email AS qmail,a.user_email AS amail,q.topic,q.content,q.user, q.create_time, q.vote, count(a.id) AS anumber FROM question q LEFT JOIN answer a ON q.id = a.question_id WHERE q.id=$id";
    $sql2= "SELECT q.id AS qid,q.user_email AS mail, a.user_email AS amail,q.topic,q.content,q.user,q.create_time,q.vote AS qvote, a.vote AS avote,a.user AS auser, a.create_time as atime, a.content as acontent, a.id AS aid  FROM question q LEFT JOIN answer a ON q.id = a.question_id WHERE q.id= $id ORDER BY avote DESC ";
    $result = $con->query($sql1);
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()){
            $anumber = $row["anumber"];
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web for Questions and Answers">
        <meta name="author" content="13513095 Fitra Rahmamuliani">
        <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
        <script src="js/jsajax.js"></script>
        <script src="js/validate.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Simple Stack Exchange</title>
         <script>
            function confirmationDelete(id,choice) 
            {
                if (confirm("Are you sure to delete this question?") == true) 
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() 
                    {
                        if (xhttp.readyState == 4 && xhttp.status == 200) 
                        {
                          location.href = "list.php";
                        }
                    }
                xhttp.open("POST", "update.php", true);
                xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + id + "&choice=" + choice);
                }
            }
        </script>
        <script type="text/javascript">
            function vote(id,type,result)
            {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() 
                {
                    if (xhttp.readyState == 4 && xhttp.status == 200) 
                    {
				        if(type == 'question')
					       document.getElementById("questionvotenumber").innerHTML = xhttp.responseText;
				        else
					       document.getElementById("answervotenumber"+id).innerHTML = xhttp.responseText;
                    }
                }
                xhttp.open("POST", "./AJAX/vote.php", true);
                xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhttp.send("result=" +result+ "&id=" + id + "&type=" + type);
            }
            </script>
    </head>
    <body>
        <div class="container">
            <div class="title"><a href="list.php">Simple StackExchange</a></div>
            <div class="subq black"><?php echo '<a href="detail.php?topic='.base64_encode($row["id"]).'">';?>
            <?php echo $row["topic"];?></a></div>
            <div class="question">
                <div class="votepart" id="votebutton">
                    <div><a href="javascript:vote(<?php echo $row['id']?>,'question','up')"><img class="voteup" src="img/voteup.png"></a></div>
                    <div id ="questionvotenumber" class="votenumber"><?php echo $row["vote"];?></div>
                    <div><a href="javascript:vote(<?php echo $row['id']?>,'question','down')"><img class="votedown" src="img/votedown.png"></a></div>
                </div>
                <div class="questionpart partmedium">
                    <div class="qcontent medium"><?php echo $row["content"];?>
                    </div>
                </div>
                <div class="labelunder">
                    <p class="ab">asked by </p>
                    <a href="#" class="askedname"><?php echo $row["user"];?> (<?php echo $row["qmail"];?>)</a>
                    <p class="ab">at</p>
                    <p class="date"><?php $phpdate=strtotime($row["create_time"]); $mysqldate = date('d-m-Y H:i:s', $phpdate); echo $mysqldate;?></p>
                     <form action="edit.php" method="post" class="hiddenform">
                        <input type="hidden" id="id" name="id" value="<?php echo $row["id"];?>"/>
                        <input class="edit" type="submit" value="edit">                        
                    </form>
                     <a href="javascript:confirmationDelete(<?php echo $row['id'] ?>,'2')" class="delete">delete</a>
                </div>
            </div>
            <div class="subq black">
                <div class="answernum"><?php echo $row["anumber"];?></div>
                    Answer
            </div>
        <?php }}
        ?>
            <?php 
                $result2 = $con->query($sql2);
                if ($result2->num_rows>0) {
                    while ($row = $result2->fetch_assoc()){
                        if ($anumber>0){?>
            <div class="raq">
                <div class="votepart">
                    <div><a href="javascript:vote(<?php echo $row['aid']?>,'answer','up')"><img class="voteup" src="img/voteup.png"></a></div>
                    <div id="answervotenumber<?php echo $row['aid']?>" class="votenumber"><?php echo $row["avote"];?></div>
                    <div><a href="javascript:vote(<?php echo $row['aid']?>,'answer','down')"><img class="votedown" src="img/votedown.png"></a></div>
                </div>
                <div class="questionpart partmedium">
                    <div class="qcontent medium">
                           <?php echo $row["acontent"];?>
                    </div>
                </div>
                <div class="labelunder labelmedium">
                    <p class="ab">asked by </p>
                    <a href="#" class="askedname"><?php echo $row["auser"];?> (<?php echo $row["amail"];?>)</a>
                    <p class="ab">at</p>
                    <p class="date"><?php $phpdate=strtotime($row["create_time"]); $mysqldate = date('d-m-Y H:i:s', $phpdate); echo $mysqldate;?></p>
                </div>
            </div>
            <?php }}}?>
            <div class="subq abu">Your Answer</div>
            <form class="formsearch createquestion" name="createquestion" method="post" onsubmit="return validateAnswerForm()" action="insertanswer.php?id=<?php echo $get?>">
                <input type="text" id="createname" name="createname" placeholder="Name" />
                <input type="text" id="createemail" name="createemail" placeholder="Email" />
                <textarea type="text" id="createcontent" name="createcontent" placeholder="Content"></textarea>
                    <button type="submit" name="submit">Post</button>
            </form>
        </div>
    </body>
</html>