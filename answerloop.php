<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/10/2015
 * Time: 8:42 AM
 */
for ($count=0;$count<=2;$count++) {
    echo '
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

               answered by
               <a href="http://www.google.com" id="bluelink">username</a>
               at datetime
               [
               <a href="http://www.google.com">edit</a>
               ]
               <a href="http://www.google.com" id="redlink">delete</a>

           </td>
       </tr>

       </table>'
       ;
}
?>