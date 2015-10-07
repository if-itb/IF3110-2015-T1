<?php include( 'template/header.php' ); ?> 
  <header>
    <h1>Simple StackExchange</h1>
  </header>
  
  <h2>Recently Asked Questions</h2>
  
  <hr>

  <div class="question-list">
    
    <div class="question">
      
      <div class="question-status">
        <div class="question-vote">
          <div class="status-counts">
            <span>0</span>
          </div>

          <div class="status-title">
            <span>vote</span>
          </div>
        </div>
        
        <div class="question-answer">
          <div class="status-counts">
            <span>0</span>
          </div>

          <div class="status-title">
            <span>answer</span>
          </div>
        </div>
      </div>
      
      <div class="question-summary">
        
        <h2 class="question-title">
          <a href="question.php">Question title</a>
        </h2>
        
        <div class="question-meta">
          <p>
            Asked by
            Name |
            <a href="edit.php" class="question-edit">Edit</a> |
            <a href="" class="question-delete">Delete</a>
          </p>
        </div>
      
      </div>
    
    </div><!-- .question -->

    <hr>
  
  </div> <!-- .question-list -->
<?php include( 'template/footer.php' ); ?> 