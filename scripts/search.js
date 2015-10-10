/**
 * Created by sorlawan on 07/10/15.
 */

function search(str) {
    var arr =JSON.parse(str); // Parse data JSON

    // Membuat elemen HTML berdasarkan array hasil search
    var body = document.getElementsByClassName('container')[0];
    var listQuestions = document.createElement('div');
    listQuestions.className="table";
    var question,qelemen;
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
                    var qelemen1=document.createElement('div');
                    var qelemen2=document.createElement('div');
                    qelemen.className = "elemQ"
                    qelemen1.className = "elemQuestion";
                    qelemen1.innerHTML = "<span class='topic'>" + arr[i].qtopic + "</span>" + arr[i].qcontent;

                    qelemen2.className = "elemAuthor";
                    qelemen2.innerHTML = "<span class='askedBy'>Asked By : </span>";
                    qelemen2.innerHTML += arr[i].email;
                    qelemen.appendChild(qelemen1);
                    qelemen.appendChild(qelemen2);

                    break;
                }

            }
            question.appendChild(qelemen);
        }
        listQuestions.appendChild(question);
    }
    body.appendChild(listQuestions);

    // Membuat Handler untuk menuju ke halaman detail apabila user klik ke salah satu pertanyaan
    var rows = document.getElementsByClassName("row");
    for (var i=0;i<rows.length;i++) {
        rows[i].onclick = function() {
            document.getElementsByName('idClicked')[0].value = this.id;
            document.goToDetail.submit();
        }
    }
}



