<!DOCTYPE>
<html>
<head>
<title>Stack Exchange</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="startpagescript.js"></script>
</head>
<body>
<div id="container">
<div id="header"><h1>SIMPLE STACK EXCHANGE</h1></div>
<div id="wrapper">
  <div id = "navigation">
    <p><strong>Navigation</strong></p>
      <ul>
        <li><a href="http://satriapriambada.blogspot.com">Kunjungi Blog Tio</a></li>
        <li><a href="http://satriapriambada.blogspot.com">I'm feeling Lucky</a></li>
      </ul>
  </div>
  <div id = "content">
    <center>
      <form action="showDataBase.php">
        <input type ="textbox" id="searchbox">
        <button>Search</button> 
      </form>
      <h2>Have Question? <a href="postQuestion.html">Ask Here</a></h2>
    </center>
    <div>
      <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         
         $sql = 'SELECT name, topic, vote, num_ans FROM question';
         mysql_select_db('tubeswbd');
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
         {
            echo 
                "EMP ID :{$row['id']}  <br> ".
               "EMP NAME : {$row['name']} <br> ".
               "EMP SALARY : {$row['topic']} <br> ".
               "<br>";
         }
         
         echo "More here\n";
         
         mysql_close($conn);
      ?>
    </div>
    

  </div>
  <div id = "extra">
    <div>There are no stupid question, only curious mind</div>
    <p><i> - Satria Priambada</i></p>
  </div>
</div>
  
</div>
</body>
</html>
