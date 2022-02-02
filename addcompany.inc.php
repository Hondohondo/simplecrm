<?php

$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);
$city = addslashes($_POST['city']);
$state = addslashes($_POST['state']);
$zip = addslashes($_POST['zip']);
$country = addslashes($_POST['country']);
$tel = addslashes($_POST['tel']);
$email = addslashes($_POST['email']);
$website = addslashes($_POST['website']);
$firstname1 = addslashes($_POST['firstname1']);
$lastname1 = addslashes($_POST['lastname1']);
$title1 = addslashes($_POST['title1']);
$tel1 = addslashes($_POST['tel1']);
$email1 = addslashes($_POST['email1']);
$firstname2 = addslashes($_POST['firstname2']);
$lastname2 = addslashes($_POST['lastname2']);
$title2 = addslashes($_POST['title2']);
$tel2 = addslashes($_POST['tel2']);
$email2 = addslashes($_POST['email2']);
$code = addslashes($_POST['code']);
$shortdesc = addslashes($_POST['shortdesc']);
$group = addslashes($_POST['group']);
$notes = addslashes(htmlspecialchars($_POST['notes']));
$date = date("Y-m-d");

$poster = addslashes($_POST['poster']);

if (trim($poster) == "") {
    echo "<h2 class=\"heading-two\">Sorry each company has to have a poster</h2>";
} else {
    $con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die("Could not connect to");

   /* $query = "INSERT INTO orgs (orgname, address, city, state, zip, country, tel, email, website, name1first, name1last, name1title, name1tel, name1email, name2first, name2last, name2title, name2tel, name2email, code, shortdesc, notes, date, groups, poster) VALUES ('$name', '$address', '$city', '$state', '$zip', '$country', '$tel', '$email', '$website', '$firstname1', '$lastname1', '$title1', '$tel1', '$email1', '$firstname2', '$lastname2', '$title2', '$tel2', '$email2', '$code', '$shortdesc', '$notes', '$date', '$group', '$poster')";*/

  $query = "INSERT INTO orgs (`orgname`, `address`, `city`, `state`, `zip`, `country`, `tel`, `email`, `website`, `name1first`, `name1last`, `name1title`, `name1tel`, `name1email`, `name2first`, `name2last`, `name2title`, `name2tel`, `name2email`, `code`, `shortdesc`, `notes`, `date`, `groups`, `poster`) VALUES ('$name', '$address', '$city', '$state', '$zip', '$country', '$tel', '$email', '$website', '$firstname1', '$lastname1', '$title1', '$tel1', '$email1', '$firstname2', '$lastname2', '$title2', '$tel2', '$email2', '$code', '$shortdesc', '$notes', '$date', '$group', '$poster')";

//    $query = "INSERT INTO companies (title, poster, shortdesc, status, notes) VALUES ('$name', '$poster', '$shortdesc', '$address', '$notes')";
//    $query = "INSERT INTO orgs (orgname, poster, shortdesc, address, notes) VALUES ('$name', '$poster', '$shortdesc', '$address', '$notes')";


    $result = mysqli_query($con, $query) or die ('Sorry we couldnt post that company right now');
    
    if ($result)  {
        echo "<h2 class=\"heading-two\">Company posted</h2>";

        header("Location: index.php");

    } else {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        echo "<h2 class=\"heading-two\">Sorry there was a problem posting your company</h2>";

    }

    
}


?>