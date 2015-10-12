<!DOCTYPE html>
<html>
<head>
    <title>list</title>
    <link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="script_delete.js"></script>
    

</head>

<body>
    <div class="board">
        <a href="list.php"><h1>Simple StackExchange</h1></a>
        <form>
            <input type="text" class="boxsearch" placeholder="Search..">
            <button type="submit" class="posisisearch">Search</button>
        </form>       
        
        <br>
        <h5>Cannot find what you are looking for? 
        <a href="create.php" ><span class="ask">Ask here</span></a></h5>

        Recently Asked Questions
    
   <?php
        include ("list_replace.php");
    ?>
        
        
    </div>
    
    
    
    
</body>




</html>