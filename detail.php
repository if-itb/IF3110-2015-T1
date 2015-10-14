<?php 
    include 'index.php';
    $get = $_GET['topic'];
    $id = (int) base64_decode($get);
    $sql1 = "SELECT q.id,q.topic,q.content,q.user, q.create_time, q.vote, count(a.id) AS anumber FROM question q LEFT JOIN answer a ON q.id = a.question_id WHERE q.id=$id";
    $sql2= "SELECT q.id AS qid,q.topic,q.content,q.user,q.create_time,q.vote AS qvote, a.vote AS avote,a.user AS auser, a.create_time as atime, a.content as acontent  FROM question q LEFT JOIN answer a ON q.id = a.question_id WHERE q.id= $id ORDER BY avote DESC ";
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
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Simple Stack Exchange</title>
    </head>
    <body>
        <div class="container">
            <div class="title">Simple StackExchange</div>
            <div class="subq black"><?php echo '<a href="detail.php?topic='.base64_encode($row["id"]).'">';?>
            <?php echo $row["topic"];?></a></div>
            <div class="question">
                <div class="votepart" id="votebutton<?php echo $row['id'];?>">
                    <div class="voteup"><a href='javascript:;'></a></div>
                    <div class="votenumber"><?php echo $row["vote"];?></div>
                    <div class="votedown"><a href='javascript:;'></a></div>
                </div>
                <div class="questionpart partmedium">
                    <div class="qcontent medium"><?php echo $row["content"];?>
                    </div>
                </div>
                <div class="labelunder">
                    <p class="ab">asked by </p>
                    <a href="#" class="askedname"><?php echo $row["user"];?></a>
                    <p class="ab">at</p>
                    <p class="date"><?php $phpdate=strtotime($row["create_time"]); $mysqldate = date('d-m-Y H:i:s', $phpdate); echo $mysqldate;?></p>
                    <a href="#" class="edit">edit </a>
                    <a href="#" class="delete">delete </a>
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
                    <div class="voteup"><a href='javascript:;'></a></div>
                    <div class="votenumber"><?php echo $row["avote"];?></div>
                    <div class="votedown"><a href='javascript:;'></a></div>
                </div>
                <div class="questionpart partmedium">
                    <div class="qcontent medium">
                           <?php echo $row["acontent"];?>
                    </div>
                </div>
                <div class="labelunder labelmedium">
                    <p class="ab">asked by </p>
                    <a href="#" class="askedname"><?php echo $row["auser"];?></a>
                    <p class="ab">at</p>
                    <p class="date"><?php $phpdate=strtotime($row["create_time"]); $mysqldate = date('d-m-Y H:i:s', $phpdate); echo $mysqldate;?></p>
                </div>
            </div>
            <?php }}}?>
            <div class="subq abu">Your Answer</div>
            <form class="formsearch createquestion" method="post" action="insertanswer.php?id=<?php echo $get?>">
                <input type="text" id="createname" name="createname" placeholder="Name" />
                <input type="text" id="createemail" name="createemail" placeholder="Email" />
                <textarea type="text" id="createcontent" name="createcontent" placeholder="Content"></textarea>
                    <button type="submit" name="submit">Post</button>
            </form>
        </div>
    </body>
</html>