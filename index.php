<?php
include 'header.php';

echo "<div class='searchbar' align='center'>
      <tr>
        <form method='get' action='search.php'><td>
          <input type='text' name='q' size='89'>
        </td> 
        <td>
          <input type='submit' value='Search'>
        </td></form>
      </tr>
    </div>
    <div class='newbutton' align='center'>
    <form method='get' action='edit.php'>
      <input type='submit' value='New Question' name='qid'></input>
    </form>
    </div>
  </body>
</html>";
