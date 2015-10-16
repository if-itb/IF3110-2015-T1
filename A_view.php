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
<?php 
	include("A_config.php");
	$id = $_GET['post_id'];
	$query = mysql_query("select * from post where post_id = '$id' ") or die("hello");
?>

</head>

<body class="default" onload="loadComment('<?php echo $id; ?>')">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="A_index.php"><h1>Simple StackExchange</h1></a>
</nav>

 <?php 
	while ($data = mysql_fetch_array($query))
	{
?>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            
            <h2 class="art-title"><?php echo $data['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr />
			
			
			
			
			 <!--ul-nya diganti biar hrzntl k smpg ama konten-->
			<ul class="art-list-item">
                <div class="art-list-item-title-and-time">
					<div class="kotakpanah">
<a href="votepost.php?post_id=<?php echo $data['post_id']; ?>&votes=1">
  <img src="assets/img/up.png" style="width:36px;height:36px;">
</a>
<div><?php echo $data['votes']; ?></div>
<div><a href="votepost.php?post_id=<?php echo $data['post_id']; ?>&votes=-1">
  <img src="assets/img/down.png" style="width:36px;height:36px;">
</a></div>
<div><?php echo $data['konten']; ?></div>
</div>
                   
                </div>
			</ul>
			
				<p>asked by <?php echo $data['email']; ?> at <?php echo $data['tanggal'];?> | <a href="A_edit_post.php?post_id=<?php echo $data['post_id']; ?>">edit</a> | <a href="javascript:delete_post(<?php echo $data['post_id']; ?>)">delete</a></p>
				
				
            <hr />
			
<?php } ?>            
            
			
		
		
			
			
			
			
			<ul class="art-list-body">
                <div id="komenList"></div> <!--bikin jd ada Votes-nya-->
				</ul>
			
			
			<h2>Your Answer</h2>

       
                <form onsubmit="addComment('<?php echo $id; ?>'); return false;">
               
                    <ul><input type="text" name="nama" placeholder="Name" id="nama"></ul>
    
                    <ul><input type="text" name="email" placeholder="Email" id="email"></ul>
                    
                    <ul>
                    <textarea name="komen" rows="20" cols="20" placeholder="Content" id="komen"></textarea></ul>

                    <ul><input type="submit" name="submit" value="Post" class="submit-button"></ul>
                </form>

        </div>
    </div>

</article>


</div>

<script type="text/javascript" src="A_comment.js"></script>
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