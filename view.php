<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">

    <script>
	function validateForm() {
    	var a_name = document.forms["a_form"]["a_name"].value;
    	var a_email = document.forms["a_form"]["a_email"].value;
    	var a_content = document.getElementById("a_content").value;
    	if (a_name == null || a_name == "" || a_email == null || a_email == "" || a_content == null || a_content == "") {
        	alert("All fields must be filled out");
        	return false;
    	} else if (!validateEmail(a_email)) {
    		alert("Email address not valid");
    		return false;
    	}
	}
	function validateEmail(email) {
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
		return re.test(email);
	}
	</script>
</head>
<body id="question">
	<div class="container">
    <h1>Simple StackExchange</h1>
    <h2>The question topic</h2>
    <hr>
    <div class="question-full">
        <div class="question-votes">
            <div class="upvote"></div>
            <div class="vote-number">2</div>
            <div class="downvote"></div>
        </div>
        <div class="question-content">
        Halaman utama berisi daftar judul pertanyaan, siapa yang bertanya, dan isi pertanyaan. Isi pertanyaan yang terlalu panjang harus dipotong. Silakan definisikan sendiri seberapa panjang agar tetap baik terlihat di layout yang Anda buat.
        </div>
        <div class="details">asked by name | edit | delete</div>
    </div>
    <h2>1 Answer</h2>
    <hr>
    <div class="question-full">
        <div class="question-votes">
            <div class="upvote"></div>
            <div class="vote-number">2</div>
            <div class="downvote"></div>
        </div>
        <div class="question-content">
        Halaman utama berisi daftar judul pertanyaan, siapa yang bertanya, dan isi pertanyaan. Isi pertanyaan yang terlalu panjang harus dipotong. Silakan definisikan sendiri seberapa panjang agar tetap baik terlihat di layout yang Anda buat.
        </div>
        <div class="details">asked by name | edit | delete</div>
    </div>
    <hr>
    <form action="submitanswer.php" method="post" id="a_form" onsubmit="return validateForm()">
        <input type="text" class="form-control" placeholder="Name" name="a_name"><br>
        <input type="text" class="form-control" placeholder="Email" name="a_email"><br>
        <textarea id="a_content" name="a_content" placeholder="Content"></textarea><br>
        <button type="submit">Post</button>
    </form>
    </div>
</body>

</html>
