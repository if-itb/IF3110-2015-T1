<?php 
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="ikon.ico">
    <title>Answer and Question</title>
    <!-- styles -->
    <link rel="stylesheet" type="text/css" href='resources/css/style.css'/>
    <link rel="stylesheet" type="text/css" href='resources/css/button.css'/>
    <script src="resources/js/validate.js" type="text/javascript"></script>
   </head>
<body> 
  <?php    
        $str = "";
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $str = isset($_GET["keyword"]) ? $_GET["keyword"] : '';
        }
  ?>
   <div class="atas">
  <a href="index.php"><div class="brands" ><br><br><img src="logo.png"></div></a><br><br>
  <form  method="get"  action=<?php echo "index.php?keyword=".$str;?> >
      <input name="keyword" class="span42" type="text" placeholder="search question">
      <input class="tombol" type="submit"  value="search">  </button>
    </form>
    <div class="middle">Cannot find what you are looking for ?<a class="tekskuning" href="post.php" class="ask">Ask here</a></div>
    <br></div>
    <h3 class="header">Recently asked question</h3>
 
    <div class="bawah">
    <div id ="table">
    <?php 
    if(empty($_GET['keyword'])){
      $strs = "";
    }else{
      $strs = mysqli_real_escape_string($conn, $_GET['keyword']);
    }
    
    $sql = "SELECT * FROM question WHERE Q_Topic like '%".$strs."%' OR Q_Content like '%".$strs."%' ";
    $results = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($results))
      {
          echo "<hr class=\"line\">"."<br><div class=\"vote\">".$row["Q_Vote"]."<br>Votes</div>";
          echo "<div class=\"answer\">".$row["Q_SumAns"]."<br>Answer</div>" ;
          echo "<div class=\"quest\"><a class=\"teksbiru\" href=\"question.php?id=".$row["Q_ID"]."\">".$row["Q_Topic"]."</a>"."<br>";
          echo $row["Q_Content"]."</div><div class=\"asked\">asked by <a class=\"teksbiru\"> ";
          echo $row["Q_Name"] ."</a> | <a class=\"tekskuning\" href=\"edit.php?id=".$row["Q_ID"]."\">"."edit</a> | 
          <a class=\"teksmerah\" href=# onclick=\"confirmDelete(".$row["Q_ID"].")\">"."delete</a></div><br><br><br>";
      }
    ?>
    </div></div>

    <br><br><br><br><br><br><br><br><br>
    </body>
</html>
