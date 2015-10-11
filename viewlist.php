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
            <div>
                <strong><a href="http://localhost/detail.php?no_question={{no_question}}">{{topic}}</a></strong>
            </div>
            
            <div>
                {{content}}
            </div>
        </div>
        
        <div class="listeditor">
            asked by {{name}} | <a href="http://localhost/formedit.php?no_question={{no_question}}"><span class="edit">edit</span></a> | <span class="delete">delete</span>
        </div>
    </div>';
    

?>