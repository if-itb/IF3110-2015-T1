// Top page on page load
document.body.scrollTop = document.documentElement.scrollTop = 0;

// Delete confirmation
function confirmToDelete() {
	return confirm('Are you sure to delete this question?');
}