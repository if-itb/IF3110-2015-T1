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

