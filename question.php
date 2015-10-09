<?php 
  include "connect.php";
    if (isset($_GET['id'])) {

      $id = mysqli_real_escape_string($conn, $_GET['id']);
      $q = "SELECT
              *
          FROM
              `question`
          WHERE
              `Q_ID` = '$id'";
      $s = mysqli_query($conn, $q) or die(mysqli_error());
      if (mysqli_num_rows($s) > 0) {
          $result = mysqli_fetch_assoc($s);
          $title = $result['Q_Topic'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="ikon.ico">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href='resources/css/style.css'/>
     <link rel="stylesheet" type="text/css" href='resources/css/button.css'/>
    <script src="resources/js/validate.js" type="text/javascript"></script>
    <script src="resources/js/vote.js" type="text/javascript"></script>
 </head>
<body> 
    <div class="atas">
     <a href="index.php"><div class="brands" ><br><br><img src="logo.png"></div></a><br><br>
    </div>

    
    <?php
   
          echo "<div class=\"ask\">".
                  "<div class=\"headers\">".$result['Q_Topic']."</div> <div class=\"bawah\">".
                  "<div class=\"votes\">"."<div class=\"arrow-up\" onclick=\"voteq(".$id.")\">".
                  "</div><div id='voteq'>".$result['Q_Vote'].
                  "</div><div class=\"arrow-down\" onclick=\"voteqm(".$id.")\"></div>"."</div>".
                  "<div class=\"konten\">".$result['Q_Content']."</div>".
                  "<br><div class=\"by\">asked by ".$result['Q_Name']." at ".$result['Q_Datetime'].
                  "| <a class=\"tekskuning\" href=\"edit.php?id=".$result["Q_ID"]."\">"."edit</a> | 
                  <a class=\"teksmerah\" href=\"delete.php?id=".$result["Q_ID"]."\">"."delete</a>"." </div><br>
                  </div>".
                  "<div class=\"headers\">".$result['Q_SumAns']." Answer </div>".
              "</div><div class=\"bawah\">";
          $r = "SELECT
              *
          FROM
              `answer`
          WHERE
              `Q_ID` = '$id'";
          $t = mysqli_query($conn, $r) or die(mysqli_error());
          if (mysqli_num_rows($t) > 0) {
             while($result = mysqli_fetch_assoc($t)){
              echo " <div class=\"ans\">".
                  "<div class=\"votes\">"."<div class=\"arrow-up\" onclick=\"votea(".$result['A_ID'].")\">
                  </div><div class=\"voteas\" id='votea".$result['A_ID']."'>"
                  .$result['A_Vote']."</div><div class=\"arrow-down\" onclick=\"voteam(".$result['A_ID']
                    .")\"></div>"."</div>".
                  "<div class=\"konten\">".$result['A_Content']."</div>".
                  "<br><div class=\"byans\">answered by ".$result['A_Name']." at ".$result['A_Datetime']."</div>
                  <hr
                   class=\"line\">".
              "</div>";
            }
          }
      }
      else {
          echo "Article not found";/* Article not found */
      }
  }
  else
  {
    echo "fail";
  }
  $name = $email =$content = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $content = $_POST["content"];
  }
?>
  <h3 class="headersk"> Your Answer</h3>
  <form name="AForm" method="post" onsubmit="return validateAForm()" action="ans.php?id=<?php echo $id;?>">
      <input name="name" class="span4" type="text" placeholder="name" value="<?php echo $name;?>">
      <span id="nameErr" class="error">*</span>
      <br>
      <input name="email" class="span4" type="text" placeholder="email" value="<?php echo $email;?>">
      <span id="emailErr" class="error">*</span><br>
      <textarea name="content" class="span41" placeholder="content" style="padding:11px 4px;"><?php echo $content;?></textarea>                  
      <span id="contentErr" class="error">*</span>
      <br>
      <button class="tombol2" type="submit"> Post </button>
      <script src="resources/js/validate.js" type="text/javascript"></script>
  </form>
  <br><br><br><br></div><br><br><br><br><br>

</body>
</html>