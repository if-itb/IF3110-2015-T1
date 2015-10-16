<!DOCTYPE html>
<html lang="en">

<head>
	<title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">

</head>
<body>
	<div class="container">
    <a href="index.php"><h1>Simple StackExchange</h1></a>
    <h2>What's your question?</h2>
    <hr>
    <form id="q-form" action="submitquestion.php" method="post" id="q_form" onsubmit="return validateQuestion()">
        <input type="text" class="form-control" placeholder="Name" name="q_name"><br>
        <input type="text" class="form-control" placeholder="Email" name="q_email"><br>
        <input type="text" class="form-control" placeholder="Question Topic" name="q_topic"><br>
        <textarea id="q_content" name="q_content" placeholder="Content"></textarea><br>
        <button type="submit">Post</button>
    </form>
    </div>

    <script src="js/functions.js"></script>
</body>

</html>
