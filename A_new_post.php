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


<title>Simple | Ask Here</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="A_index.php"><h1>Simple StackExchange</h1></a>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>What's your question?</h2>
			<hr />

            <div id="contact-area">
                <form method="post" action="A_new_post_process.php">
				
				
				<!--<form onsubmit="addPost('TANDAKURANGDARI?php echo $id; ?>'); return false;">--> <!--!!!!!!!!-->
				
				
                    <input type="text" name="nama" placeholder="Name" id="nama">
    
                    <input type="text" name="email" placeholder="Email" id="email">
				
                    <input type="text" name="judul" placeholder="Question topic" id="judul">
                    
                    <textarea name="konten" rows="20" cols="20" placeholder="Content" id="konten"></textarea>

                    <input type="submit" name="submit" value="Post" class="submit-button"> <!--bikin sebelah KANAN-->
                </form>
            </div>
        </div>
    </div>

</article>


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
