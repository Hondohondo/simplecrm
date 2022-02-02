<?php

$con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die('Sorry, could not connect to server');

// This line of code uses the $_GET[] PHP array. This function retrieves the value of the id HTML variable that the main.inc.php program passes within the URL. It then assigns the value to the PHP variable $companyid.
$companyid = $_GET['id'];


//the program creates an SQL query string to retrieve all of the data fields from the companies table for the specified company number:
$query = "SELECT title, poster, shortdesc, status, notes from companies where companyid = $companyid";

$result = mysqli_query($con, $query) or die('Sorry, could not find company requested');

$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die ('No records retrieved');

$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];

$status = $row['status'];
$notes = $row['notes'];

$status = nl2br($status);
$notes = nl2br($notes);

echo "<h2 class=\"heading-two\"> $title </h2>\n";

echo " by $poster <br><br>\n";

echo " $shortdesc <br><br>\n";

echo " <h3 class=\"heading-three\">Status: </h3>\n";

echo " $status<br><br>\n";

echo " <h3 class=\"heading-three\">Notes: </h3>\n";

echo " $notes";

echo "<br><br>\n";

$query = " SELECT count(logid) from logs where companyid = $companyid";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

    if ($row[0] == 0) {

    echo " No logs posted yet. nbsp; nbsp; \n";

    echo " <a href=\"index.php?content=newlog&id=$companyid\"> Add a log</a>\n";

    echo " &nbsp; &nbsp; &nbsp; <a href=\"print.php?id=$companyid\" target=\"_blank\"> Print page</a>\n";

    echo "<hr>\n";

    } else {

        echo $row[0] . "\n";

        echo "&nbsp; Logs posted. &nbsp;&nbsp;\n";

        echo "<a href=\"index.php?content=newlog&id=$companyid\">Add a log </a>\n";

        echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$companyid\" target=\"_blank\">Print page</a>\n";

        echo "<hr>\n";

        echo "<h2 class=\"heading-two\">Logs:</h2>\n";

        $query = "SELECT date, poster, log from logs where companyid = $companyid order by logid desc";

        $result = mysqli_query($con, $query) or die ('Could not retrieve logs');

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $date = $row['date'];
            $poster = $row['poster'];
            $log = $row['log'];
            $log = nl2br($log);

            echo "$date - posted by $poster<br>\n";

            echo "$log\n";

            echo "<br><br>\n";
        }

    }

?>
