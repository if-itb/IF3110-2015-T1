<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php $id=$_GET['id']; ?>
        
        <?php if ($id==0) $title="Ask New Question";
            else $title="Edit Question";
        ?>
        
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jvs.js"></script>
    </head>
    <body>
        
        <?php require("php/database.php"); ?>        
        <?php
            if ($id==0){
                $q['username']=''; $q['title']='';
                $q['email']=''; $q['content']='';
                $t = "new";
            }
            else {
                $q = getQuestion($id);  
                $t="edit";
            }
        
        ?>
       <div id="Title">
            <a href="home.php"><h1 class="t">Simple StackExchange</h1></a>
        </div>
        
        <div class="raq">What's Your Question ?</div>
        <div class="separator"></div>
        
        <form action="home.php" method="POST"  onsubmit="return formValidator(this);">
            <input id="fname" type="text" name="username" placeholder="Name : " value="<?php echo $q['username'] ?>"/> 
            <input id="femail" type="text" name="email" placeholder="Email : " value="<?php echo $q['email'] ?>"/>
            <input id="ftitle" type="text" name="title" placeholder="Title : " value="<?php echo $q['title'] ?>"/> 
            <textarea id="fcontent" name="content" placeholder="Content : " ><?php echo $q['content'] ?></textarea> 
           <div id="ermsg"></div><div id="ermsg2"></div>
               <input id="fsubmit" type="submit" value="Post this !"><br>
            <input type="hidden" name="aa" value="<?php echo $t ?>" >
            <input type="hidden" name="id_q" value="<?php echo $id ?>" >
         </form>
        
          
        
       
    </body>
</html>