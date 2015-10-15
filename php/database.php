<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

DEFINE('HOST','localhost');
DEFINE('NAME','stackexc');
DEFINE('USERNAME','root');
DEFINE('PASSWORD','');

$conn = mysqli_connect(HOST, USERNAME,PASSWORD,NAME);

function getAllQuestion() {
    
    global $conn;
    
    $sql = "SELECT * FROM question";
    $result = mysqli_query($conn, $sql);

    $ret = array();
    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $row['countans'] = countAnswer($row['id_q']) ;
        $ret[] = $row;
    }
   
    return $ret;
}

function countAnswer($id) {
    global $conn;
    
    $sql = "SELECT COUNT(id_a) as total FROM answer WHERE q_id=$id";
    $result = mysqli_query($conn,$sql);
    $ret = mysqli_fetch_array($result,MYSQLI_ASSOC)['total'];
    return $ret;
}

function getQuestion($id) {
    global $conn;
    
   
    $sql = "SELECT * FROM question WHERE id_q=$id";
    
    $result = mysqli_query($conn, $sql);
    $ret = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    return $ret;
}

function getAnswer($id) {
     global $conn;   
    $sql = "SELECT * FROM answer WHERE q_id=$id";    
    $result = mysqli_query($conn, $sql);
    $ret = array();
    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {        
        $ret[] = $row;
    }
   
    return $ret;
}
function addNewQuestion($q) {
    global $conn;
    $sql1 = "SELECT MAX(id_q) as max FROM question" ;
    $result1 = mysqli_query($conn,$sql1);
    $ret1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)['max'];
    $nid = $ret1 + 1;
    $sql2 = "INSERT INTO question (id_q,username,email,title,content,date,vote) VALUES ('$nid','$q[username]','$q[email]','$q[title]','$q[content]', CURRENT_TIMESTAMP,0)";
    
    $result2 = mysqli_query($conn,$sql2);
    return $result2;
    
}

function addAnswer($q) {
    global $conn;
    $ida=$q['id_a'];
    $idq=$q['q_id'];
    $sql = "INSERT INTO `answer` (`id_a`, `q_id`, `content`, `date`, `vote`, `username`, `email`) VALUES ('$ida','$idq','$q[content]',CURRENT_TIMESTAMP,0,'$q[username]','$q[email]')";
    
    $result = mysqli_query($conn,$sql);
    return $result;
}

function editQuestion($q) {
    global $conn;

    $sql= "UPDATE question SET username='$q[username]',email='$q[email]',title='$q[title]',content='$q[content]' WHERE id_q =$q[id_q]";
    //echo "enter edit : ",$q['id_q']," | ",$sql ;
    $result = mysqli_query($conn, $sql);
     return $result;
}

function getVote($src,$id) {
    global $conn ;
   if ($src=='q') {
       $sql="SELECT vote FROM question WHERE id_q=$id";
   }
   else {
       $sql="SELECT vote FROM answer WHERE id_a=$id";
   }
   $result = mysqli_query($conn,$sql);
    $ret = mysqli_fetch_array($result,MYSQLI_ASSOC)['vote'];
    return $ret;
}

function changeVote($src,$id,$num) {
    global $conn ;
    echo $src,$id,$num;
     if ($src=='q') {
       $sql="UPDATE question SET vote=(vote+$num) WHERE id_q=$id";
   }
   else {
       $sql="UPDATE answer SET vote=(vote+$num) WHERE id_a=$id";
   }
   $result=  mysqli_query($conn, $sql);
   return $result;
}