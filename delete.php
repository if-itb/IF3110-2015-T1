<script type="text/javascript">
    var confirmation = confirm("Are you sure you want to delete this question?");
    if (confirmation === true) {
        window.location ="./mysql/delete_question.php?id=<?php echo $_GET['id'] ?>";
    } else {
        window.location ="index.php" ;
    }
</script>
