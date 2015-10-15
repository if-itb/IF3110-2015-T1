(function(){

    var topics = document.getElementsByClassName('topic');
    var del = document.getElementsByClassName('delete');
    var edit = document.getElementsByClassName('edit');

    for (var i=0;i<topics.length;i++){
        topics[i].onclick = function(event){
            console.log("tuuhhu");
            window.location = "/answer?id=" + event.target.parentNode.parentNode.parentNode.getAttribute("data-id");
        }
    }

    for (var i=0;i<edit.length;i++){
        edit[i].onclick = function(event){
            window.location = "/question/edit.php?id=" + event.target.parentNode.parentNode.parentNode.parentNode.getAttribute("data-id");
        }
    }

    for (var i=0;i<del.length;i++){
        del[i].onclick = function(event){
            if (confirm("Are you sure you want to delete this question ?")){
                window.location = "ajax/question/delete.php?id=" + event.target.parentNode.parentNode.parentNode.parentNode.getAttribute("data-id");
            }
        }
    }

})();