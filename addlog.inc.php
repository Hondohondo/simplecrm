<?php

    $companyid = $_POST['companyid'];

    $poster = $_POST['poster'];

    $log = htmlspecialchars($_POST['log']);

    $date = date("Y-m-d");

    $con =mysqli_connect("localhost", "root", "Hondohondo97", "company") or die("could not connect");

    $query = "INSERT INTO logs (orgid, poster, date, log) " .
            " VALUES ($companyid, '$poster', '$date', '$log') ";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<h2 class=\"heading-two\">Log posted</h2>";

//        header("Location: index.php");
        header("Location: index.php?content=showcompany&id=$companyid");
    } else {
        echo "<h2 class=\"heading-two\">Sorry there was a problem posting a log</h2>\n";

        echo "<a href=\"index.php?content=showcompany&id=$companyid\">Return to company</a>\n";
    }

?>