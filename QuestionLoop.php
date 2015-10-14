<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/10/2015
 * Time: 8:42 AM
 */
for ($count=0;$count<=4;$count++) {
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
                    0
                </center>
            </td>

            <td>
                <center>
                    0
                </center>
            </td>

            <td rowspan="2">

                    The question goes here...The question goes here...The question goes here...The question goes here...The question goes here...The question goes here...The question goes here...The question goes here...

            </td>

        </tr>

        <tr>
            <td>
                <center>
                    View
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
                <a href="http://www.google.com" id="bluelink">name</a>
                [
                <a href="http://www.google.com">edit</a>
                ]
                <a href="http://www.google.com" id="redlink">delete</a>

            </td>
        </tr>

    </table>
    ';
}
?>