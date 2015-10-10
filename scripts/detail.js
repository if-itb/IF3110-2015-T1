function createDetail() {
    makePresentation();         // Membuat presentasi detail dalam bentuk elemen HTML
    createHandlerVoteQuestion(); // Membuat handler untuk Vote pertanyaan
    createDeleteHandlerForDetail(); // Membuat handler untuk Delete pertanyaan
    createEditHandlerForDetail();   // Membuat handler untuk Edit pertanyaan

    // Handler untuk submit jawaban
    document.getElementById('submitBtn').onclick=function(event){
        //Validasi form
        var name = document.getElementById('name');
        var email = document.getElementById('email');
        var acontent = document.getElementById('acontent');
        if (validateForm(name, email, acontent)) {
            document.questionForm.submit();
        }
        else
        {
            // Mencegah submit apabila form belum valid
            event.preventDefault();
        }
    }
}


function makePresentation() {
    var x = document.getElementById("x").innerHTML;
    var res = JSON.parse(x); // Parse JSON data menjadi array Javascript
    var answer = document.getElementsByClassName("answer")[0];

    // Membuat elemen HTML berdasarkan array yang telah diperoleh
    for(var i=0;i<res.length;i++) {
        var row = document.createElement("div");
        row.className = "row clearfix";
        row.id = res[i].a_id;

        var vote = document.createElement("div");
        vote.className = "colVote";
        var arrowUp = document.createElement("div");
        arrowUp.className = "aVote arrow-up";
        var arrowDown = document.createElement("div");
        arrowDown.className = "aVote arrow-down";
        var voteVal = document.createElement("span");
        voteVal.className = "voteVal";
        voteVal.innerHTML = res[i].vote;

        vote.appendChild(arrowUp);
        vote.appendChild(voteVal);
        vote.appendChild(arrowDown);


        var ans = document.createElement("div");
        ans.className = "elemQDetail";

        var content = document.createElement("div");
        content.className = "elemQuestion elemA";
        content.innerHTML = res[i].acontent;

        var author = document.createElement("div");
        author.className="elemAuthor";
        var askedBy = document.createElement("span");
        askedBy.className="answeredBy";
        askedBy.innerHTML = "Answered By : ";

        var athr = document.createElement("div");
        athr.className="author";
        var name = document.createElement("span");
        name.className="name";
        name.innerHTML = res[i].email + " at " + res[i].date;
        athr.appendChild(name);

        author.appendChild(askedBy);
        author.appendChild(athr);

        ans.appendChild(content);
        ans.appendChild(author);

        row.appendChild(vote);
        row.appendChild(ans);
        answer.appendChild(row);
    }

    createHandlerVoteAnswer();  // Membuat handler untuk vote Jawaban
}