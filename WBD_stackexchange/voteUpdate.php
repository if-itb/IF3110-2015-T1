<?php
/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/11/2015
 * Time: 11:30 AM
 */

    if (isset($_GET['questionOrAnswerId'])){
        $username = 'root';
        $password = '';
        $database = 'WBD1';
        $conn = new mysqli('localhost', $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $questionOrAnswerId= $_GET['questionOrAnswerId'];
        $questionOrAnswer= $_GET['questionOrAnswer'];
        $voteUpOrDown=$_GET['voteUpOrDown'];


        if ($questionOrAnswer=="question"){
            //Get present vote number
            $strSql="SELECT * FROM Questions WHERE questionId=$questionOrAnswerId";
            $result = $conn->query($strSql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $vote = $row['vote'];

            //action to vote number (add/reduce)
            if ($voteUpOrDown=="up"){
                $vote=$vote+1;
            } else if ($voteUpOrDown=="down"){
                $vote=$vote-1;
            }



            //Update vote number
            $strSql2= "UPDATE Questions SET vote=$vote WHERE questionId=$questionOrAnswerId";
            if ($conn->query($strSql2) === TRUE) {
                //succeed
            }
            else{
                //failed
            }
        } else //$questionOrAnswer=="answer"
        {
            $strSql="SELECT * FROM Answers WHERE answer_id=$questionOrAnswerId";
            $result = $conn->query($strSql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $vote = $row['vote'];

            //action to vote number (add/reduce)
            if ($voteUpOrDown=="up"){
                $vote=$vote+1;
            } else if ($voteUpOrDown=="down"){
                $vote=$vote-1;
            }

            //Update vote number
            $strSql2= "UPDATE Answers SET vote=$vote WHERE answer_id=$questionOrAnswerId";
            if ($conn->query($strSql2) === TRUE) {
                //succeed
            }
            else{
                //failed
            }
        }

        //display
        echo "$vote";
    }