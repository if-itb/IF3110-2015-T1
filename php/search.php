<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 6:50
 */

$user = "tiso";
$password = "baptiso";
$database = "stackExchange";
$link = mysqli_connect("localhost", $user, $password, $database);

/* Cek Koneksi Database */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$keyword=$_POST['keyword'];

$query = "select * from questions WHERE qcontent LIKE '%".$keyword."%'";

$result = mysqli_query($link, $query) ;

$resArray = array();
while($row =mysqli_fetch_assoc($result))
{
    array_push($resArray,$row);
}
$res = json_encode($resArray);


mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
<h1>Simple StackExchange</h1>
<div class="container clearfix">
    <form class="searchForm" action="search.php" method="POST">
        <input class="searchInput"  name="keyword" type="text" placeholder="Keyword Pencarian"/>
        <button class="searchBtn" type="submit">Search</button>
    </form>
    <p class="askHere">Cannot find what you are looking for ? <a href="../create.html">Ask here</a></p>
    <h4><?php echo count($resArray)?> Question about '<?php echo $keyword ?>' Found | <a href="../list.html">Home</</a></h4>
</div>
<script>

    var body = document.getElementsByClassName('container')[0];
    var listQuestions = document.createElement('div');
    listQuestions.className="table";


    var question,qelemen;
    var arr = JSON.parse('<?php echo $res; ?>');
    for(var i = 0; i < arr.length; i++) {
        question = document.createElement('div');
        question.className = "row clearfix";
        for (var j = 0; j < 4; j++) {
            qelemen = document.createElement('div');
            switch (j) {
                case 0 :
                {
                    qelemen.className = "elemValue";
                    qelemen.innerHTML="<span>" + arr[i].vote+"</span>"+ "<span class='vote'>Votes</span>";
                    break;
                }
                case 1 : {
                    qelemen.className = "elemAnswer";
                    qelemen.innerHTML="<span>" + arr[i].answer+"</span>"+ "<span class='ans'>Answers</span>";
                    break;
                }
                case 2 :
                {
                    qelemen.className = "elemQuestion";
                    qelemen.innerHTML="<span class='topic'>"+arr[i].qtopic+"</span>"+arr[i].qcontent;
                    break;
                }
                case 3 :
                {
                    qelemen.className = "elemAuthor";
                    qelemen.innerHTML = arr[i].email;
                    break;
                }
            }
            question.appendChild(qelemen);
        }
        listQuestions.appendChild(question);
    }
    body.appendChild(listQuestions);



</script>
</body>
</html>
