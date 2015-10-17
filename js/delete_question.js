function confirmDelete(id) {
    var x;
    if (confirm("Are you sure to delete this post?") == true) {
        location.href = "backend/delete.php?id="+id;
	}
}