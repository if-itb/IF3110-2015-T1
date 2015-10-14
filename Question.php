<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<Center>
    <h1>Simple StackExchange</h1>

    <br>

    <h4 class="relative5">
        The question topic goes here
    </h4>

    <hr width="770">

   <table width="700" border="0px">
       <tr>
           <td width="10">
               <img src="arrowup.png" alt="upvote" style="width:40px;height:40px;" align="center">
           </td>
           <td rowspan="3">
           content rowspan
           </td>
       </tr>

       <tr>
           <td>
               <center>
                   0
               </center>
           </td>
       </tr>

       <tr>
           <td>
               <img src="arrowdown.png" alt="upvote" style="width:40px;height:40px;">
           </td>
       </tr>

       <tr>
           <td colspan="4" align="right">

               asked by
               <a href="http://www.google.com" id="bluelink">username</a>
               at datetime
               [
               <a href="http://www.google.com">edit</a>
               ]
               <a href="http://www.google.com" id="redlink">delete</a>

           </td>
       </tr>

       </table>


    <br><br><br><br>

    <h4 class="relative4">
        X Answers
    </h4>

    <?php

    include 'answerloop.php';

    ?>

    <hr width="770">
    <h4 class="relative3">
        Your Answer
    </h4>

    <h4 class="relative2">
        <input type="text" name="Name" value="Name" size="100"><br>
        <input type="text" name="Email" value="Email"size="100"><br>
        <input class="contentquestion" type="text" name="Content" value="Content" size="100" height="500"><br><br>
        <input class="textboxposquestion" type="submit" value="post">
    </h4>








</Center>



</body>
</html>
