<?php

$title = addslashes($_POST['title']);
$poster = addslashes($_POST['poster']);
$shortdesc = addslashes($_POST['shortdesc']);
$summary = addslashes(htmlspecialchars($_POST['summary']));
$details = addslashes(htmlspecialchars($_POST['details']));

if (trim($poster) == "") {
    echo "<h2 class=\"heading-two\">Sorry each company has to have a poster</h2>";
} else {
    $con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die("Could not connect to");

    $query = "INSERT INTO companies (title, poster, shortdesc, status, notes) VALUES ('$title', '$poster', '$shortdesc', '$summary', '$details')";

    $result = mysqli_query($con, $query) or die ('Sorry we couldnt post that company right now');
    
    if ($result)  {
        echo "<h2 class=\"heading-two\">Company posted</h2>";

    } else {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        echo "<h2 class=\"heading-two\">Sorry there was a problem posting your company</h2>";

    }

    
}


?>