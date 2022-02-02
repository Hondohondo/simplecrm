<?php

if(!isset($_SESSION['valid_crm_user'])) {
    echo "<h2 class='heading-two'>You do not have permission to post new organisations</h2>\n";
    echo "<a href='index.php?content=login'>Please login to post organisations</a>\n";

} else {

    $userid = $_SESSION['valid_crm_user'];

    echo "<form action=\"index.php\" method=\"post\">\n";

    echo "  <h2 class=\"heading-two\">Add New company/organisation</h2>\n";

    echo "  <h3 class=\"heading-three\">Company/Organisation Info</h3>\n";

    echo "Name: <input type=\"text\" name=\"name\"> <br>\n";

    echo "Address: <input type=\"text\" name=\"address\"> <br>\n";

    echo "City: <input type=\"text\" name=\"city\"> <br>\n";

    echo "State: <input type=\"text\" name=\"state\"> <br>\n";

    echo "Zip: <input type=\"text\" name=\"zip\"> <br>\n";

    echo "Country: <input type=\"text\" name=\"country\"> <br>\n";

    echo "Tel: <input type=\"text\" name=\"tel\"> <br>\n";

    echo "Email: <input type=\"text\" name=\"email\"> <br>\n";

    echo "Website: <input type=\"text\" name=\"website\"> <br>\n";

    echo "<h3 class=\"heading-three\">Contact Person 1</h3>\n";

    echo "First Name: <input type=\"text\" name=\"firstname1\"> <br>\n";

    echo "Last Name: <input type=\"text\" name=\"lastname1\"> <br>\n";

    echo "Title: <input type=\"text\" name=\"title1\"> <br>\n";

    echo "Tel: <input type=\"text\" name=\"tel1\"> <br>\n";

    echo "Email: <input type=\"text\" name=\"email1\"> <br>\n";

    echo "<h3 class=\"heading-three\">Contact Person 2</h3>\n";

    echo "First Name: <input type=\"text\" name=\"firstname2\"> <br>\n";

    echo "Last Name: <input type=\"text\" name=\"lastname2\"> <br>\n";

    echo "Title: <input type=\"text\" name=\"title2\"> <br>\n";

    echo "Tel: <input type=\"text\" name=\"tel2\"> <br>\n";

    echo "Email: <input type=\"text\" name=\"email2\"> <br>\n";

    echo "<h3 class=\"heading-three\">Details</h3>\n";

    echo "Code: <input type=\"text\" name=\"code\"> <br>\n";

    echo "Short Desc: <input type=\"text\" name=\"shortdesc\"> <br>\n";

    echo "Group: <input type=\"text\" name=\"group\"> <br>\n";

    echo "Notes: <br><textarea name=\"notes\" cols=\"50\" rows=\"15\"></textarea> <br>\n";

//    echo "<textarea name=\"details\" cols=\"50\" rows=\"10\"></textarea> <br>\n";

    echo " <input type=\"submit\" value=\"submit\"> \n ";

    echo "Poster: <input type=\"hidden\" name=\"poster\" value=\"$userid\" > <br> ";

    echo "<input type=\"hidden\" name=\"content\" value=\"addcompany\">";

    echo "</form>";

}

//(before session)    Poster: <input type="text" size="40" name="poster"> <br>

?>


