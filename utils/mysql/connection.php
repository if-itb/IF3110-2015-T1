<?php
    
    namespace utils\mysql;

    function connect(){
        $domain   = "localhost";  // or yourdomainname.com
        $username = "root";       // db username
        $password = "";    // db password
        $dbName   = "stackexchange";   // db name
    
        $conn = mysqli_connect($domain,$username,$password,$dbName);

        // Check connection
        if (mysqli_connect_errno()){
            die('Mysql connection error');
        }

        return $conn;
    }

    function close($connection){
        $connection->close();
    }
?>