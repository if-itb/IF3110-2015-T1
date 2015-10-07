<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 6:50
 */

require_once("connectDatabase.php");

#Keyword yang diinput oleh user
$keyword=$_POST['keyword'];

#Ambil data dari database
$query = "select * from questions WHERE qcontent LIKE '%".$keyword."%'";
$result = mysqli_query($link, $query) ;
$resArray = array();
while($row =mysqli_fetch_assoc($result))
{
    array_push($resArray,$row);
}
$res = json_encode($resArray);
$res=str_replace("'","\'",$res);
$res=str_replace('"','\"',$res);

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="../scripts/search.js"></script>
</head>
<body>
<h1>Simple StackExchange</h1>
<div class="container clearfix">
    <form class="searchForm" action="search.php" method="POST">
        <input class="searchInput"  name="keyword" type="text" placeholder="Keyword Pencarian"/>
        <button class="searchBtn" type="submit">Search</button>
    </form>
    <form name="hiddenForm" action="detail.php" method="POST">
        <input type="hidden" name="idClicked" value=""/>
    </form>
    <p class="askHere">Cannot find what you are looking for ? <a href="../create.html">Ask here</a></p>
    <h4><?php echo count($resArray)?> Question about '<?php echo $keyword ?>' Found | <a href="../list.html">Home</a></h4>
</div>
<script>
    (function() {
        if(getCookie("refreshed")=="true")
        {
            document.cookie="refreshed=false";
            window.location.reload();
        }
        search(JSON.parse('<?php echo $res ?>'));
    })();
</script>
</body>
</html>
