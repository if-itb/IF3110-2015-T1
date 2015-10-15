<?php
  function shorter($text, $size) {
    $len = strlen($text);
    $result = substr($text, 0, $size);
    if($size < $len)  
      $result .= "...";
    return $result;
  }
?>

<!DOCTYPE html>
<html> 
  <head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <title>StackExchange</title>
  </head>
  <body>
    <h1 id="title"><a href="/">Simple StackExchange</a></h1>
    <div id="search">
      <form action="/" method="GET">
          <input type="hidden" name="action" value="search"/>
          <input id="search-text" type="search" name="keyword" placeholder="Searching Question?"/> </td>
          <input id="search-button" type="submit" value="search" />
      </form>
    </div>
    <p class="to-ask-here">
      Cannot find what you are looking for? <a id="ask-here" href="?action=ask">Ask Here</a>
    </p>
    <?php if(isset($keyword)) { ?>
    <h2 id="recent-ask">Questions Related To "<?=shorter($keyword, 60)?>" :</h2>
    <?php } else { ?>
    <h2 id="recent-ask">Recently Asked Question</h2>
    <?php } ?>
    <hr class="line">

    <?php foreach($questions as $question): ?>
      <div class="item">
        <div class="counter">
          <div class="num"><?=$question["vote"]?></div>
          <div class="label">Votes</div>
        </div>
        <div class="counter">
          <div class="num"><?=$question["answer"]?></div>
          <div class="label">Answers</div>
        </div>
        <div class="question">
          <h4><a  class="topic" href="?action=read&amp;id=<?=$question["id"]?>"><?=shorter($question["topic"],139)?></a></h4>
          <p class="brief"><?=shorter($question["content"], 600)?></p>
        </div>
        <div class="footer">
          <p>
            asked by 
            <a class="name" href="mailto:<?=$question["email"]?>"><?=$question["name"]?> &lt;<?=$question["email"]?>&gt;</a> | 
            <a class="edit" href="?action=edit&amp;id=<?=$question["id"]?>">edit</a> | 
            <a class="delete" href="#" onclick="removeQuestion(<?=$question["id"]?>)">delete</a> 
          </p>
        </div>
      </div>
      <hr class="line">
    <?php endforeach; ?>
    <script type="text/javascript" src="assets/js/validation.js"></script>
  </body>
</html>