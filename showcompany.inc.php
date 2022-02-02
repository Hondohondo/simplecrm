<?php

$con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die('Sorry, could not connect to server');

// This line of code uses the $_GET[] PHP array. This function retrieves the value of the id HTML variable that the main.inc.php program passes within the URL. It then assigns the value to the PHP variable $companyid.
$companyid = $_GET['id'];


//the program creates an SQL query string to retrieve all of the data fields from the companies table for the specified company number:
/*$query = "SELECT orgname, address, city, state, zip, country, tel, email, website, name1first, name1last, name1title, name1tel, name1email, name2first, name2last, name2title, name2tel, name2email, code, shortdesc, notes, date, groups, poster from orgs where orgid = $companyid";*/

$query = "SELECT `orgname`, `address`, `city`, `state`, `zip`, `country`, `tel`, `email`, `website`, `name1first`, `name1last`, `name1title`, `name1tel`, `name1email`, `name2first`, `name2last`, `name2title`, `name2tel`, `name2email`, `code`, `shortdesc`, `notes`, `date`, `groups`, `poster` from orgs where orgid = $companyid";

$result = mysqli_query($con, $query) or die('Sorry, could not find company requested');

$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die ('No records retrieved');

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

echo "<h2 class=\"heading-two\"> $name </h2> <span class='group'>$group</span> \n";

echo "$address<br>\n";
echo "$city  $state  $zip  $country  <br>\n";
echo "$tel  $email  $website  <br>\n";

echo " <h3 class=\"heading-three\">People to Contact: </h3>\n";
echo "$firstname1  $lastname1<br>\n";
echo "$title1  $tel1  $email1  <br><br>\n";

echo "$firstname2 $lastname2<br>\n";
echo "$title2  $tel2  $email2 | <br>\n";

echo " $code <br><br>\n";

echo " <h3 class=\"heading-three\">Short Description: </h3>\n";

echo " $shortdesc<br><br>\n";

echo " <h3 class=\"heading-three\">Notes: </h3>\n";

echo " $notes";

echo "<span class='date-poster'> $date posted by $poster </span><br><br>\n";

echo "<br><br>\n";


$query = " SELECT count(logid) from logs where orgid = $companyid";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

    if ($row[0] == 0) {

   /*     echo ' <div class="display-flex flex-space-between">
       <div class="logs-left">
        <span>No logs posted yet.</span>
    </div>
    <div class="logs-right">
       <a href="index.php?content=newlog&id=$companyid"> Add a log</a>
    </div>
    </div> ';*/

   echo " No logs posted yet. nbsp; nbsp; \n";

    echo " <a href=\"index.php?content=newlog&id=$companyid\"> Add a log</a>\n";

    echo " &nbsp; &nbsp; &nbsp; <a href=\"print.php?id=$companyid\" target=\"_blank\"> Print page</a>\n";

    echo "<hr>\n";

    } else {

        $totrecords = $row[0];

        echo "$totrecords Logs posted.\n";

        echo "<a href=\"index.php?content=newlog&id=$companyid\">Add a log </a>\n";

        echo "<hr class='log-hr'>\n";

        echo "<h2 class=\"heading-two\">Logs:</h2>\n";

        if(!isset($_GET['page'])) {
            $thispage = 1;
        } else {
            $thispage = $_GET['page'];
        }
             $recordsperpage = 5;
             $offset = ($thispage - 1) * $recordsperpage;
             $totpages = ceil($totrecords / $recordsperpage);

             $query = "SELECT date, poster, log from logs where orgid = $companyid order by logid desc limit $offset, $recordsperpage";

             $result = mysqli_query($con, $query) or die ('Could not retrieve logs: ');
             /* $result = mysqli_query($con, $query) or die ('Could not retrieve logs: ' . mysqli_error());*/

             while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                 $date = $row['date'];
                 $poster = $row['poster'];
                 $log = $row['log'];
                 $log = nl2br($log);

                 echo $date . "- posted by " . $poster . "\n";

                 echo "<br>";

                 echo $log . "\n";

                 echo "<br><br>\n";
             }

             if ($thispage > 1) {
                 $page = $thispage - 1;
                 $prevpage = "<a href='index.php?content=showcompany&id=$companyid&page=$page'>Prev</a>";

             } else {
                 $prevpage = "";
             }

             $bar = '';

             if ($totpages > 1) {
                 for ($page = 1; $page <= $totpages; $page++) {
                     if ($page == $thispage) {
                         $bar .= " $page ";

                     } else {
                         $bar .= " <a href='index.php?content=showcompany&id=$companyid&page=$page'>$page</a>";
                     }
                 }
             }

             if ($thispage < $totpages) {
                 $page = $thispage + 1;
                 $nextpage = " <a href='index.php?content=showcompany&id=$companyid&page=$page'>Next </a>";
             } else {
                 $nextpage = "";
             }

             echo "Go To: " . $prevpage . $bar . $nextpage;

    }

       /* echo $row[0] . "\n";

        echo "&nbsp; Logs posted. &nbsp;&nbsp;\n";

        echo "<a href=\"index.php?content=newlog&id=$companyid\">Add a log </a>\n";

        echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$companyid\" target=\"_blank\">Print page</a>\n";

        echo "<hr>\n";

        echo "<h2 class=\"heading-two\">Logs:</h2>\n";*/



//        $query = "SELECT date, poster, log from logs where orgid = $companyid order by logid desc";

//        $result = mysqli_query($con, $query) or die ('Could not retrieve logs');


?>
