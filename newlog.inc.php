<?php
    $companyid = $_GET['id'];

    //check if the valid_crm_user session cookie userid has been set
    if(!isset($_SESSION['valid_crm_user'])) {
        echo "<h2 class='heading-two'>Sorry, you don't have permission to post logs</h2><br>\n";
        echo "<a href='index.php?content=login'>Please login to post logs</a><br>\n";
        echo "<a href='index.php?content=showcompany&id=$companyid'>Go back to organisations</a>\n";

    } else {

        //if the valid_crm_user has been set
        //the username is extracted from the session cookie and used as a hidden value in the new log form
        $userid = $_SESSION['valid_crm_user'];

    echo "<form action=\"index.php\" method=\"post\">\n";

    echo "<h2 class=\"heading-two\">Add log</h2>";

    echo "<textarea rows=\"10\" cols=\"50\" name=\"log\"> </textarea><br>\n";

// (before session)   echo "Submitted by:<input type=\"text\" name=\"poster\"><br>\n";
    echo "Submitted by:<input type=\"hidden\" name=\"poster\" value=\"$userid\"><br>\n";

    echo "<input type=\"hidden\" name=\"companyid\" value=\"$companyid\">\n";

    echo "<input type=\"hidden\" name=\"content\" value=\"addlog\">\n";

    echo "<br><input type=\"submit\" value=\"submit\">\n";

    echo "</form>\n";
    }

?>
