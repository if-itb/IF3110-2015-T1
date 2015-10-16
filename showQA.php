<!DOCTYPE>
<html>
<head>
<title>Stack Exchange</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="startpagescript.js"></script>
	<script type="text/javascript">
		function validateEmail(email){
			var re = /\S+@\S+\.\S+/;
			return re.test(email);
		}
		function validateAnswer() {
		    //Check if empty
		    if (document.forms["AnsForm"]["name"].value == null || document.forms["AnsForm"]["name"].value == "" ||
		        document.forms["AnsForm"]["email"].value == null || document.forms["AnsForm"]["email"].value == "" ||
		        document.forms["AnsForm"]["content"].value == null || document.forms["AnsForm"]["content"].value == "") {
		        alert("There is an Empty Field");
		        return false;
		    }
		    //Check email
		    else if(!validateEmail(document.forms["AnsForm"]["email"].value)){
		        alert("Incorrect email address");
		        return false;
		    }
		}
	</script>
</head>
<body>
<div id="container">
<div id="header"><h1>SIMPLE STACK EXCHANGE</h1></div>
<div id="wrapper">
  <div id = "navigation">
    <p><strong>Navigation</strong></p>
      <ul>
        <li><a href="http://satriapriambada.blogspot.com">Kunjungi Blog Tio</a></li>
        <li><a href="index.php">I'm feeling Lucky</a></li>
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
      <table width = "100%" frame = "below">
      <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $idquestion = $_GET['id'];
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         //Select and print question
         $sql = "SELECT name, topic, vote, timeask, content,num_ans FROM question WHERE ID='$idquestion' ";
         mysql_select_db('tucilwbd');
         $retval = mysql_query( $sql, $conn );

		if(! $retval )
		{
		die('Could not get data: ' . mysql_error());
		}

		$row = mysql_fetch_array($retval, MYSQL_ASSOC);

         echo 
                "<thead><th colspan =\"5\">  {$row['topic']} </th></thead> ".
                " <tr> <td style=\"width:20%\"> <button onclick=\"voteQuestion($idquestion)\">Up</button> </td> ".
                " <td rowspan=\"2\" style=\"width:80%\"> Content : {$row['content']} </td> </tr>".
                " <tr> <td style=\"width:20%\"> Vote : <div id=\"num_question_vote\">{$row['vote']} </div></td> </tr>".
                " <tr> <td style=\"width:20%\"> <button onclick=\"downVoteQuestion($idquestion)\">Down</button> </td> ".
                " <td> Asked by : {$row['name']} ".
                "   <a href=\"showDataBase.php?id=$idquestion\" > edit</a> ".
                "   <a href=\"Delete.php?id=$idquestion\">delete</a></td></tr>";
         echo "<tr><td><b>{$row['num_ans']} Answers</b></td></tr>";
                

         //Select and print answer
         $sqlans = "SELECT name, vote, timeans, content,idans FROM answer where IDquestion='$idquestion' ";
         mysql_select_db('tucilwbd');       
         $retvalans = mysql_query( $sqlans, $conn );
         
         if(! $retvalans )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retvalans, MYSQL_ASSOC))
         {
             echo 
                " <tr> <td style=\"width:20%\"> <button onclick=\"voteAns({$row['idans']})\">Up</button>  </td> ".
                " <td rowspan=\"2\" style=\"width:80%\"> Content : {$row['content']}</td> </tr>".
                " <tr> <td style=\"width:20%\"> Vote : <div id=\"num_ans_vote_{$row['idans']}\">{$row['vote']} </div></td> </tr>".
                " <tr> <td style=\"width:20%\"> <button onclick=\"downVoteAns({$row['idans']})\">Down</button> </td> ".
                " <td> Asked by : {$row['name']} ".
                "   at {$row['timeans']}</td></tr>".
                " <tr style=\"height:40px\"></tr>";
         }
		//Create the answer form
        echo 
        "<form method=\"POST\" action=\"postAns.php\" onsubmit=\"return validateAnswer()\" name=\"AnsForm\">
		<input type=\"hidden\" name=\"qID\" value=\"$idquestion\">
		<table border=\"0\" align =\"left\" width=\"100%\">  
			<tr> 
				<td> <input type=\"text\" name=\"name\" placeholder=\"Name\" style=\"width:90%\"></td> 
			</tr> 
			<tr>  
				<td><input type=\"text\" name=\"email\" placeholder=\"E-mail\" style=\"width:90%\"></td> 
			</tr>
			<tr>  
				<td>
					<textarea name=\"content\" placeholder=\"Content\" rows=\"5\" cols=\"30\" style=\"width:90%;font-size:20px\"></textarea>
				</td> 
			</tr> 
			<tr> 
				<td align =\"right\"><input id=\"button\" type=\"submit\" name=\"submit\" value=\"Post\" style=\"width:10%\"onclick=\"validateEmail()\"></td> 
			</tr> 
		</table> 
		</form> ";

         
         mysql_close($conn);
      ?>
      </table>
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
