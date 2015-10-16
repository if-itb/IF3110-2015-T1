function confirmDeletion(questionid) {
	if (confirm("Are you sure to delete this question?")) {
		window.location.href="index.php?id=" + questionid;
	}
}