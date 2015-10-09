
<!--/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/9/2015
 * Time: 10:11 PM
 */-->

<?php
    $username = 'root';
    $password = '';
    $database = 'WBD1';
    mysql_connect('localhost', $username, $password);
    @mysql_select_db($database) or die("Unable to Select Database");
?>