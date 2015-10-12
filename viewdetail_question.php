<?php
    
    $queryString = '<strong>{{topic}}</strong>
    <div class="votequestform">
            <div class="vote">
                <div class="vote-up">
                
                </div>
                
                <div class="vote-count">
                    {{vote}}
                </div>
                
                <div class="vote-down">
                
                </div>
            </div>
            
            <div class="question">
                {{content}}
            </div>
            
            <div class="detaileditor">
            asked by {{name}} at {{date}} | <a href="formedit.php?no_question={{no_question}}"><span class="edit">edit</span></a> | <a href="#" onclick="deleteConfirm({{no_question}})" ><span class="delete">delete</span></a>
            </div>
        </div>';
?>