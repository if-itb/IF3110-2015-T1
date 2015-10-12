function deleteConfirm(no_question) 
{
    if (confirm("Are you sure want to delete this question?")) {
        document.location = "question_delete.php?no_question=" + no_question;
    }
}