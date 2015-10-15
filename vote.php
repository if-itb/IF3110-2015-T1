
 <?php
    require("php/database.php");
    if (isset($_POST['num'])&&isset($_POST['sr'])&&isset($_POST['id'])) 
    {        
        changeVote($_POST['sr'],$_POST['id'],$_POST['num']);
        
    }
?>