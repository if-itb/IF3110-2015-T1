<?php echo "view/home.php<br>"; ?>
<!DOCTYPE html>
<html> 
  <head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <title>StackExchange</title>
  </head>
  <body>
    <h1 id="title"><a href="/">Simple StackExchange</a></h1>
    <div id="search">
      <form>
          <input id="search-text" type="search" name="q" placeholder="Searching Question?"/> </td>
          <input id="search-button" type="submit" value="search" />
      </form>
    </div>
    <p class="to-ask-here">
      Cannot find what you are looking for? <a id="ask-here" href="?action=ask">Ask Here</a>
    </p>
    <h2 id="recent-ask">Recently Asked Question</h2>
    <hr class="line">

    <?php foreach($questions as $question) {?>
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
          <h4><a  class="topic" href="?action=read&amp;id=<?=$question["id"]?>"><?=$question["topic"]?></a></h4>
          <p class="brief"><?=$question["content"]?></p>
        </div>
        <div class="footer">
          <p>
            asked by 
            <span class="name"><?=$question["name"]?> &lt;<?=$question["email"]?>&gt;</span> | 
            <a class="edit" href="?action=edit&amp;id=<?=$question["id"]?>">edit</a> | 
            <span class="delete">delete</span> 
          </p>
        </div>
      </div>
      <hr class="line">
    <?php } ?>
  </body>
</html>