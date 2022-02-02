<?php

$con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die("Sorry could not connect");

$search = $_GET['searchFor'];

$words = explode(" ", $search);

$phrase = implode("%' AND title LIKE '%", $words);

$query = "SELECT companyid, title, shortdesc from companies where title like '%$phrase%'";

$result = mysqli_query($con, $query) or die("Could not query database");

echo "<h1 class=\"heading-one\">Search Results</h1><br>\n";

if(mysqli_num_rows($result) == 0) {
    echo "<h2 class=\"heading-two\">Sorry, no companies were found with '$search' in them.</h2>";
} else {
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $companyid = $row['companyid'];
        $title = $row['title'];
        $shortdesc = $row['shortdesc'];

        echo "<a href=\"index.php?content=showcompany&id=$companyid\">$title</a><br>\n";

        echo "$shortdesc<br>\n";
    }
}

?>
