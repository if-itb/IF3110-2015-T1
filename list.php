<!DOCTYPE html>
<html>
<head>
    <title>list</title>
    <link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="script.js"></script>
    

</head>

<body>
    <div class="board">
        <div class="container">
            <h1>Simple StackExchange</h1>
            <form>
                <input type="text" class="boxsearch" placeholder="Search..">
                <button type="submit" class="posisisearch">Search</button>
            </form>       
        </div>
        <br>
        <h5>Cannot find what you are looking for? 
        <a href="http://localhost/create.html" ><span class="ask">Ask here</span></a></h5>

        Recently Asked Questions
        

  
    <div class="listform">
        <div class="listvotes">
            <div>
                0
            </div>
            
            <div>
                Votes
            </div>
        </div>
        
        <div class="listanswer">
            <div>
                0
            </div>
            
            <div>
                Answer
            </div>
        </div>
        
        <div class="listtopic">
            <div>
                <strong>Topic</strong>
            </div>
            
            <div>
                isi dari pertanyaan...
            </div>
        </div>
        
        <div class="listeditor">
            asked by name | <a href="http://localhost/create.html"><span class="edit">edit</span></a> | <span class="delete">delete</span>
        </div> 
    </div>
    
    
   <?php
        include ("list_replace.php");
    ?>
        
        
    </div>
    
    
    
    
</body>




</html>