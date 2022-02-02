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

//$query = "SELECT title, poster, shortdesc, status, notes from companies where companyid = $companyid";

$query = "SELECT `orgname`, `address`, `city`, `state`, `zip`, `country`, `tel`, `email`, `website`, `name1first`, `name1last`, `name1title`, `name1tel`, `name1email`, `name2first`, `name2last`, `name2title`, `name2tel`, `name2email`, `code`, `shortdesc`, `notes`, `date`, `groups`, `poster` from orgs where orgid = $companyid";

$result = mysqli_query($con, $query) or die("Could not find company");

$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die("No records retrieved");
/*
$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];
$status = $row['status'];
$notes = $row['notes'];

$status = nl2br($status);
$notes = nl2br($notes);*/
$name = $row['orgname'];
$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];
$country = $row['country'];
$tel = $row['tel'];
$email = $row['email'];
$website = $row['website'];
$firstname1 = $row['name1first'];
$lastname1 = $row['name1last'];
$title1 = $row['name1title'];
$tel1 = $row['name1tel'];
$email1 = $row['name1email'];
$firstname2 = $row['name2first'];
$lastname2 = $row['name2last'];
$title2 = $row['name2title'];
$tel2 = $row['name2tel'];
$email2 = $row['name2email'];
$code = $row['code'];
$shortdesc = $row['shortdesc'];
$group = $row['groups'];
$notes = $row['notes'];
$date = $row['date'];

$poster = $row['poster'];

$notes = nl2br($notes);

/*echo "<h2 class=\"heading-two\">$title</h2>\n";

echo "posted by $poster <br>\n";

echo $shortdesc . "\n";

echo "<h3 class=\"heading-three\">Status:</h3>";

echo $status . "\n";

echo "<h3 class=\"heading-three\">Notes:</h3>";

echo $notes . "\n";*/

echo "<h2 class=\"heading-two\"> $name </h2>\n";

echo "$address<br>\n";
echo "$city $state  $zip $country  <br>\n";
echo "$tel  $email  $website  <br>\n";

echo " <h3 class=\"heading-three\">People to Contact: </h3>\n";
echo "$firstname1 $lastname1<br>\n";
echo "$title1 $tel1  $email1  <br><br>\n";

echo "$firstname2 $lastname2<br>\n";
echo "$title2  $tel2  $email2 | <br>\n";

echo " $code <br><br>\n";

echo " <h3 class=\"heading-three\">Short Description: </h3>\n";

echo " $shortdesc<br><br>\n";

echo " <h3 class=\"heading-three\">Notes: </h3>\n";

echo " $notes";

echo "$date posted by $poster <br><br>\n";


?>

</body>
</html>
