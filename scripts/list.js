/**
 * Created by sorlawan on 07/10/15.
 */

function createList(){
    document.cookie="refreshed=false";
    window.onbeforeunload = function() {} ;

    /************************************************
     * AJAX
     */

    var xmlhttp = new XMLHttpRequest();
    var url = "php/list.php";
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            createResult(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", url, true);
    xmlhttp.send();

    /******************************************************
     * Membuat List Dinamis Berdasarkan Hasil dari Database
     */
    var body = document.getElementsByClassName('container')[0];
    var listQuestions = document.createElement('div');
    listQuestions.className="table";
    var question,qelemen;

    function createResult(response) {
        var arr = JSON.parse(response);
        for (var i = 0; i < arr.length; i++) {
            question = document.createElement('div');
            question.className = "row clearfix";
            question.id = arr[i].q_id;
            for (var j = 0; j < 4; j++) {
                qelemen = document.createElement('div');
                switch (j) {
                    case 0 :
                    {
                        qelemen.className = "elemValue";
                        qelemen.innerHTML = "<span>" + arr[i].vote + "</span>" + "<span class='vote'>Votes</span>";
                        break;
                    }
                    case 1 :
                    {
                        qelemen.className = "elemAnswer";
                        qelemen.innerHTML = "<span>" + arr[i].answer + "</span>" + "<span class='ans'>Answers</span>";
                        break;
                    }
                    case 2 :
                    {
                        qelemen.className = "elemQuestion";
                        qelemen.innerHTML = "<span class='topic'>" + arr[i].qtopic + "</span>" + arr[i].qcontent;
                        break;
                    }
                    case 3 :
                    {
                        qelemen.className = "elemAuthor";
                        qelemen.innerHTML = "<span class='askedBy'>Asked By : </span>";
                        qelemen.innerHTML += "<div class='author'><span class='name'>"+arr[i].email+"</span>" + "<span class='edit'>Edit</span><span class='delete'>Delete</span></div>";
                        break;
                    }
                }
                question.appendChild(qelemen);
            }
            listQuestions.appendChild(question);
        }
        body.appendChild(listQuestions);
        var rows = document.getElementsByClassName("topic");
        for (var i=0;i<rows.length;i++) {
            rows[i].onclick = function() {
                document.getElementsByName('idClicked')[0].value = this.parentNode.parentNode.id;
                document.hiddenForm.submit();
            }
        }
    }
}
