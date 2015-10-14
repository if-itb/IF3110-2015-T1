<?php
    
    $queryString = '<strong>{{topic}}</strong>
    <div class="votequestform">
            <div class="vote">
                <div class="vote-up" onClick="editVote(this.id)" id="question_up{{no_question}}">
                
                </div>
                
                <div class="vote-count" id="question{{no_question}}">
                    {{vote}}
                </div>
                
                <div class="vote-down" onClick="editVote(this.id)" id="question_down{{no_question}}">
                
                </div>
            </div>
            
            <div class="question">
                {{content}}
            </div>
            
            <div class="detaileditor">
            asked by {{name}} at {{date}} | <a href="formedit.php?no_question={{no_question}}"><span class="edit">edit</span></a> | <a href="#" onClick="deleteConfirm({{no_question}})" ><span class="delete">delete</span></a>
            </div>
        </div>';
?>