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
      echo "<table style='border: solid 1px black;'>";
      echo "<tr><th>Id</th><th>Topic</th><th>name</th></tr>";

      class TableRows extends RecursiveIteratorIterator { 
          function __construct($it) { 
              parent::__construct($it, self::LEAVES_ONLY); 
          }

          function current() {
              return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
          }

          function beginChildren() { 
              echo "<tr>"; 
          } 

          function endChildren() { 
              echo "</tr>" . "\n";
          } 
      } 

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "tubeswbd";

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT topic,name FROM question LIMIT 10"); 
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
          foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key=>$value) { 
              echo $value;
          }
      }
      catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      $conn = null;
      echo "</table>";
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
