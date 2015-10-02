
function deleteQuestion(id) {
    var a = confirm("Anda yakin ingin menghapus pertanyaan ini?");

    if ( a == true ) {
    	window.location.href = "/delete/question/" + id;
    }
}