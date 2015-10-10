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
$query = "select * from questions WHERE (qcontent LIKE '%".$keyword."%') OR (qtopic LIKE '%".$keyword."%')";
$result = mysqli_query($link, $query) ;
$resArray = array();
while($row =mysqli_fetch_assoc($result))
{
    array_push($resArray,$row);
}
$json = json_encode($resArray);

$json = str_replace('"','\"', $json);
$json = str_replace("'","\'",$json);
$json = str_replace("\\r","\\\\r",$json);
$json = str_replace("\\n","\\\\n",$json);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../styles/main.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,700italic,300' rel='stylesheet' type='text/css'>
    <script src="../scripts/search.js"></script>
</head>
<body>
<div class="header"><a href="../index.html"><h1>Simple StackExhange</h1></a></div>
<div class="container clearfix">
    <form class="searchForm clearfix" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="searchInput">
            <input  name="keyword" type="text" placeholder="Keyword Pencarian"/>
            <p class="askHere">Cannot find what you are looking for ? <a href="../create.html">Ask here</a></p>
        </div>
        <button class="searchBtn" type="submit">Search</button>
    </form>
    <form name="goToDetail" action="detail.php" method="POST">
        <input type="hidden" name="idClicked" value=""/>
    </form>
    <h4><?php echo count($resArray)?> Question about '<?php echo $keyword ?>'</h4>
<script>
    (function() {
        search('<?php echo $json ?>');
    })();
</script>
</body>
</html>
