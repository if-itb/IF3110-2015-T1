<?php 
    include "connect.php";  
    $qid = $_GET["qid"];

            
        if ($_GET["idnya"] == 1) {
            $sql="UPDATE q_list SET voteup = voteup + 1 WHERE qid=$qid";
            $result=mysqli_query($link,$sql);
            $sql="SELECT voteup, votedown FROM q_list WHERE qid=$qid";
            $result=mysqli_query($link,$sql);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row["voteup"] - $row["votedown"];
            }
        }
        else if ($_GET["idnya"] == 2){
            $sql="UPDATE q_list SET votedown = votedown + 1 WHERE qid=$qid";
            $result=mysqli_query($link,$sql);
            $sql="SELECT voteup, votedown FROM q_list WHERE qid=$qid";
            $result=mysqli_query($link,$sql);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row["voteup"] - $row["votedown"];
            }
        }
        else if ($_GET["idnya"] == 3){
            $sql="UPDATE a_list SET voteup = voteup + 1 WHERE ansid=$qid";
            $result=mysqli_query($link,$sql);
            $sql="SELECT voteup, votedown FROM a_list WHERE ansid=$qid";
            $result=mysqli_query($link,$sql);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row["voteup"] - $row["votedown"];
            }
        }
        else if ($_GET["idnya"] == 4){
            $sql="UPDATE a_list SET votedown = votedown + 1 WHERE ansid=$qid";
            $result=mysqli_query($link,$sql);
            $sql="SELECT voteup, votedown FROM a_list WHERE ansid=$qid";
            $result=mysqli_query($link,$sql);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row["voteup"] - $row["votedown"];
            }
        }
        
?>