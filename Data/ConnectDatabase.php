<?php
    $username = 'root';
    $password = '';
    $database = 'stackex';
    mysql_connect('localhost', $username, $password);
    @mysql_select_db($database) or die("Unable to Select Database");
?>