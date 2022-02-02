<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <link rel="stylesheet" type="text/css" href="css/print.css" />

    <title>The Simple CRM Solution</title>

    <script>
        window.print();
    </script>

</head>

<body>

<?php

$con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die("Could not connect");

$companyid = $_GET['id'];

$query = "SELECT title, poster, shortdesc, status, notes from companies where companyid = $companyid";

$result = mysqli_query($con, $query) or die("Could not find company");

$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die("No records retrieved");

$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];
$status = $row['status'];
$notes = $row['notes'];

$status = nl2br($status);
$notes = nl2br($notes);

echo "<h2 class=\"heading-two\">$title</h2>\n";

echo "posted by $poster <br>\n";

echo $shortdesc . "\n";

echo "<h3 class=\"heading-three\">Status:</h3>";

echo $status . "\n";

echo "<h3 class=\"heading-three\">Notes:</h3>";

echo $notes . "\n";

?>

</body>
</html>
