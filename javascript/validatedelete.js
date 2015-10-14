function confirmDelete()
{
  var x = confirm("Are you sure you want to delete the question?");
  if (x)
      return true;
  else
    return false;
}