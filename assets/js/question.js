function deleteQuestion(questionId){
	if (confirm("Are you sure you want to delete this question?"))
		window.location.href="/tools/question/deletequestion.php?id=" + questionId;
}

function editQuestion(questionId){
	console.log(questionId);
}