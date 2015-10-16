function delete_post(id)
{
	var yes = confirm("Are you sure to delete it?");
	if(yes){
		window.location.href='A_delete_post.php?post_id='+id;
	}
}