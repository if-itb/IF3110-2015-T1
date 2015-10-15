<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<Center>

    <?php
    /**
     * Created by PhpStorm.
     * User: Khalil Ambiya
     * Date: 10/15/2015
     * Time: 11:26 PM
     */
    $search = $_POST["Search"];
    ?>

    <br>
    <a href="dashboardPHP.php" id="dashboard">Simple StackExchange</a>
    <br><br>


    <p>viewing question about <?php echo $search?>

    </p>

    <?php
    /**
     * Created by PhpStorm.
     * User: Khalil Ambiya
     * Date: 10/10/2015
     * Time: 8:42 AM
     */
    //commencing database access
    $servername = "localhost";
    $username = "root";
    $password = "";
    $basisdata= "question";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $basisdata);
    //Count questions
    $sql = "select count(Question_ID)
            as num_of_questions
            from questions
            where content like '$search%' OR
                  content like '%$search' OR
                  content like '%$search%' OR
                  questiontopic like '$search%' OR
                  questiontopic like '%$search' OR
                  questiontopic like '%$search%'
            ;";
    $result = mysqli_query($conn,$sql);
    $fetched = mysqli_fetch_assoc($result);
    if ($fetched["num_of_questions"]==NULL){
        $num_of_questions= 0;
    }
    else{
        $num_of_questions = $fetched["num_of_questions"];
    }

    echo $num_of_questions." questions related";

    //fetching data
    $sql =  "select question_id, asked_by, questiontopic , vote_point, answers, content
             from questions
             where content like '$search%' OR
                  content like '%$search' OR
                  content like '%$search%' OR
                  questiontopic like '$search%' OR
                  questiontopic like '%$search' OR
                  questiontopic like '%$search%'
             ;";
    $result = mysqli_query($conn,$sql);
    $asked_by = array();
    $questiontopic = array();
    $vote_point = array();
    $nAnswer = array();
    $content = array();

    for ($nQuestion = 1;$nQuestion<=$num_of_questions;$nQuestion++){
        $row=mysqli_fetch_assoc($result);
        $questionID[$nQuestion] = $row["question_id"];
        $asked_by[$nQuestion] = $row["asked_by"];
        $questiontopic[$nQuestion] = $row["questiontopic"];
        $vote_point[$nQuestion] = $row["vote_point"];
        $nAnswer[$nQuestion] = $row["answers"];
        $content[$nQuestion] = $row["content"];
    }
    //Close Connection
    mysqli_close($conn);

    for ($count=1;$count<=$num_of_questions;$count++) {
        if (strlen($content[$count]) > 77)
            $content[$count] = substr($content[$count], 0, 77) . '...';
        echo '
    <hr width="770"; align="1";>
    <head>
        <style>
            table, th, td {
                border: 0px solid black;
            }
        </style>
    </head>
    <body>

    <table width = "700">
        <tr>
            <td>
                <center>
                    '.$vote_point[$count].'
                </center>
            </td>

            <td>
                <center>
                    '.$nAnswer[$count].'
                </center>
            </td>

            <td rowspan="2" width="600">

               <a href="Question.php?questionID='.$questionID[$count].'" id="blacklink">'.$questiontopic[$count].'</a>
               <br>
               '.$content[$count].'
            </td>

        </tr>

        <tr>
            <td>
                <center>
                    Vote
                </center>
            </td>
            <td>
                <center>
                    Answer
                </center>
            </td>

        </tr>

        <tr>
            <td colspan="4" align="right">

                asked by
                <a href="http://www.google.com" id="bluelink">'.$asked_by[$count].'</a>
                [
                <a href="editquestion.php?questionID='.$questionID[$count].'">edit</a>
                ]
                <a href="deleteonequestion.php?questionID='.$questionID[$count].'" id="redlink">delete</a>

            </td>
        </tr>

    </table>
    ';
    }
    ?>

    <hr width="770">

    <br>

</center>

</body>
</html>

