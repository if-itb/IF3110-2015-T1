<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jvs.js"></script>  
        <?php require("php/database.php"); ?>       
        
        <?php $id=$_GET['id']; 
              if (isset($_POST['bb'])) {
                  addAnswer($_POST);
              }
        ?>
        <?php $q = getQuestion($id);
              $t = $q['title'];
              $a = getAnswer($id);
              $aa['username']='';
              $aa['email']='';
              $aa['content']='';
              $ca = countAnswer($id);
              $z= ($id*1000)+$ca;
        ?>
        <title><?php echo $t ?></title>
    </head>
    <body>
        <div id="Title">
            <a href="home.php"><h1 class="t">Simple StackExchange</h1></a>
        </div>
   
      
        <div class="raq"><?php echo $t ; ?></div>
        <div class="separator"></div>
        <div id="wrap">
            <div id="main">         
               <?php echo $q['content'] ;?>
            </div>
            <div id="sidebar">         
                <div id="vnum"><?php echo $q['vote'] ;?> </div> 
                <div id="vup"><img src="img/up.png" alt="Vote Up" style="width: 32px;height:32px"></div>
                <div id="vdown"><img src="img/down.png" alt="Vote Down" style="width: 32px;height:32px"></div>
            </div>
            <div id="footer"> </div>
            <div id="qinfo">asked by <aa><?php echo $q['username'] ;?></aa> at<aa> <?php echo $q['date'] ;?></aa> |
            <a href="askhere.php?id=<?php echo $q['id_q'] ?>" ><span class="bb">edit</span></a> |
            <a href="javascript:deleteQuestion(<?php echo $q['id_q'] ?>)" ><span class="cc">delete</span></a>  
            </div>
        </div>
        <div id ="qans"><?php echo $ca ; ?> Answers</div>
         <div class="separator"></div>
        
        <?php foreach($a as $a) : ?>
           <div id="wrap">
            <div id="main">         
               <?php echo $a['content'] ;?>
            </div>
            <div id="sidebar">         
                <div id="vnum"><?php echo $a['vote'] ;?> </div> 
                <div id="vup"><img src="img/up.png" alt="Vote Up" style="width: 32px;height:32px"></div>
                <div id="vdown"><img src="img/down.png" alt="Vote Down" style="width: 32px;height:32px"></div>
            </div>
            <div id="footer"> </div>
            <div id="qinfo">answered by <aa><?php echo $a['username'] ;?></aa> at<aa> <?php echo $a['date'] ;?></aa> 
             </div>
            
        </div>
          <div class="separator2"></div>
         <?php endforeach; ?>
          
          <div id="yans">Your Answer</div>
           
        <form action="open.php?id=<?php echo $id ?>" method="POST"  onsubmit="return answerValidator(this)">
            <input id="fname" type="text" name="username" placeholder="Name : " value="<?php echo $aa['username'] ?>"/> 
            <input id="femail" type="text" name="email" placeholder="Email : " value="<?php echo $aa['email'] ?>"/>
            <textarea id="fcontent" name="content" placeholder="Content : " ><?php echo $aa['content'] ?></textarea> 
           <div id="ermsg"></div><div id="ermsg2"></div>
               <input id="fsubmit" type="submit" value="Answer "><br>               
            <input type="hidden" name="bb" value="addans" >              
            <input type="hidden" name="id_a" value="<?php echo $z ?>" >
            <input type="hidden" name="q_id" value="<?php echo $id ?>" >
          </form>
    </body>
</html>
