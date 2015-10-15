<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home - Simple Stack Exchange</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jvs.js"></script>
    </head>
    <body>
        
        <?php require("php/database.php"); ?>
        <?php  $questions = getAllQuestion();  ?>
        
        <div id="Title">
            <h1 class="t" href="home.php">Simple StackExchange</h1>
        </div>
        <form id="searchbox" action="">
             <input id="search" type="text" placeholder="  Type any keyword here . . . ">
             <input id="submit" type="submit" value="Search">
        </form>
        <p>Cannot find what you are looking for ? <a href="">Ask here</a></p>        
        <div class="raq">Recently Asked Questions</div>
        <div class="separator"></div>
        
       <?php foreach ($questions as $q) : ?>
        <div class ="info">
            <div class ="vote">
                <div class="vnum"><?php echo $q['vote']?></div>
                <div class="vname">Votes</div>           
            </div>
            
            <div class ="answers">
                <div class="vnum"><?php echo $q['countans']?></div>
                <div class="vname">Answers</div>           
            </div>
            
            <div class="thread">
                <div class="title"><?php echo $q['title']?></div>
                <div class = "content">                     
                    <?php echo substr($q['content'],0,150) ?>
                    <?php if (strlen($q['content'])>150) echo ". . . . . . " ;?>
                </div>
            </div>
            
           
            </div>
        <div class="utility">
            <aa>asked by : </aa>
            <a1><?php echo $q['username']?> </a1>|
            <bb>edit </bb>|
            <cc>delete</cc>
        </div>
         <div class="uline"></div>
        
       <?php endforeach; ?>

        
           
        
               
    </body>
</html>
