<?php
    
    $queryString = '<div class="listform">
        <div class="listvotes">
            <div>
                {{vote}}
            </div>
            
            <div>
                Votes
            </div>
        </div>
        
        <div class="listanswer">
            <div>
                {{answer}}
            </div>
            
            <div>
                Answer
            </div>
        </div>
        
        <div class="listtopic">
            <div class="topic">
                <strong><a href="detail.php?no_question={{no_question}}">{{topic}}</a></strong>
            </div>
            <div class="content">
                {{content}}
            </div>
        </div>
        
        <div class="listeditor">
            asked by {{name}} | <a href="formedit.php?no_question={{no_question}}"><span class="edit">edit</span></a> | <a href="#" onClick="deleteConfirm({{no_question}})" ><span class="delete">delete</span></a>
        </div>
    </div>';
    

?>