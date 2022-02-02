<?php

if(!isset($_SESSION['valid_crm_user'])) {
    echo "<h2 class='heading-two'>You do not have permission to post new organisations</h2>\n";
    echo "<a href='index.php?content=login'>Please login to post organisations</a>\n";

} else {

    $userid = $_SESSION['valid_crm_user'];

    echo "<form action=\"index.php\" method=\"post\">\n";

    echo "  <h2 class=\"heading-two\">Add New company</h2>\n";

    echo "Title: <input type=\"text\" size=\"40\" name=\"title\"> <br>\n";

    echo "Short Description: <br><textarea name=\"shortdesc\" cols=\"50\" rows=\"5\"></textarea> <br>\n";

    echo "<h3 class=\"heading-three\">Company Summary</h3>\n";

    echo "<textarea name=\"summary\" cols=\"50\" rows=\"10\"></textarea><br>\n";

    echo " <h3 class=\"heading-three\">Company Details</h3>\n";

    echo "<textarea name=\"details\" cols=\"50\" rows=\"10\"></textarea> <br>\n";

    echo " <input type=\"submit\" value=\"submit\"> \n ";

    echo "Poster: <input type=\"hidden\" name=\"poster\" value=\"$userid\" > <br> ";

    echo "<input type=\"hidden\" name=\"content\" value=\"addcompany\">";

    echo "</form>";

}

//(before session)    Poster: <input type="text" size="40" name="poster"> <br>

?>


