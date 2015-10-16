<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi">
<meta name="author" content="Judul">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple">
<meta property="og:description" content="Deskripsi">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">


<title>Simple</title>


</head>

<body class="default" onload="loadPost('<?php echo $id; ?>')">
<div class="wrapper">


<nav class="nav">
    <a style="border:none;" id="logo" href="A_index.php"><h1>Simple StackExchange</h1></a>
</nav>

<div id="home">


		
		
		<form id="tfnewsearch" method="post" action="search.php?go" > <!--ganti get link di sini-->
		        <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
		</form>
		<div class="tfclear"></div>
		
		
		
		<p class="ask">Can not find what you are looking for? <a href="A_new_post.php">Ask here</a></p>
		
	
	<h2>Recently Asked Questions</h2>
	
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
				  <?php 
							include('A_config.php');
				?>
			
			<!--NANTI INI SAMAIN DG buat nampilin komen (kan dari js gitu)-->
			 <?php 
				$query = mysql_query("select * from post order by post_id desc");
				while ($data = mysql_fetch_array($query)){
			?>
			
<hr />			
			<div class="idx">
<?php echo $data['votes']; ?><br>Votes

<div>0</div><p>Answers</p>
<div><a href="A_view.php?post_id=<?php echo $data['post_id']; ?>"><?php echo $data['judul']; ?></a></div>
<p><?php echo $data['konten']; ?></p>
<div class="h">asked by <?php echo $data['nama']; ?> | <a href="A_edit_post.php?post_id=<?php echo $data['post_id']; ?>">edit</a> | <a href="javascript:delete_post(<?php echo $data['post_id']; ?>)">delete</a></div>
</div>			
			
			
			<li class="art-list-item">
               

				
				
		
				
               <?php } ?>
            </li>

          </ul>
        </nav>
    </div>
</div>
<script type="text/javascript" src="delpos.js"></script>


</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>

</body>
</html>