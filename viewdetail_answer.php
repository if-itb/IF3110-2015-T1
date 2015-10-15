<?php

    $queryString = '<div class="board">
        <div class="votequestform">
            <div class="vote">
                <div class="vote-up" id="answer_up{{no_answer}}" onClick="editVote(\'answer_up{{no_answer}}\')">
                
                </div>
                
                <div class="vote-count" id="answer{{no_answer}}" >
                    {{vote}}
                </div>
                
                <div class="vote-down" id="answer_down{{no_answer}}" onClick="editVote(\'answer_down{{no_answer}}\')">
                
                </div>
            </div>
            
            <div class="question">
                {{content}}
            </div>
            
            <div class="detaileditor">
            answered by {{name}} at {{date}}
            </div>
        </div>        
    </div>';




?>