<!DOCTYPE html>
<html>
<head>
<script>
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
<style>
.column-one{
		margin-left:15%;
		width: 10%;
		color:black;
		text-align: left;
		float:left;
	}
	.column-two{
		width: 10%;
		color:black;
		text-align: left;
		float:left;
	}
	.column-three{
		width: 10%;
		color:black;
		text-align: left;
		float:left;
	}
	.column-four{
		width: 10%;
		color:black;
		text-align: left;
		float:left;
	}
	</style>
</head>
<body>

<form name="myForm" action="answer.php"
onsubmit="return validateForm()" method="post">
Name: <input type="text" name="fname">
<input type="submit" value="Submit">
</form>


	<div class="column-one">
		<p> ONE </p>
	</div>
	
	<div class="column-two">
		<p> TWO </p>
	</div>

	<div class="column-three">
		<p> THREE </p>
	</div>
	
	<div class="column-four">
		<p> FOUR </p>
	</div>

	

</body>
</html>
