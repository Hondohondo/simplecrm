<?php

if(!isset($_SESSION['valid_crm_user'])) {
    echo "<h2 class='heading-two'>You do not have permission to post new organisations</h2>\n";
    echo "<a href='index.php?content=login'>Please login to post organisations</a>\n";

} else {

    $userid = $_SESSION['valid_crm_user'];

    echo "<form class='form-register' action=\"index.php\" method=\"post\">\n";

    echo "  <h2 class=\"heading-two mg-bm-12\">Add New Company/Organisation</h2>\n";

    echo "  <h3 class=\"heading-three\">Company Info</h3>\n";


    echo '<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name">
    </div>';

//    echo "Name: <input type=\"text\" name=\"name\"> <br>\n";

//    echo "Address: <input type=\"text\" name=\"address\"> <br>\n";
    echo '<div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address">
    </div>';

//    echo "City: <input type=\"text\" name=\"city\"> <br>\n";
    echo '<div class="form-group">
        <label for="city">City:</label>
        <input type="text" name="city">
    </div>';

//    echo "State: <input type=\"text\" name=\"state\"> <br>\n";
    echo '<div class="form-group">
        <label for="state">State:</label>
        <input type="text" name="state">
    </div>';

//    echo "Zip: <input type=\"text\" name=\"zip\"> <br>\n";
    echo '<div class="form-group">
        <label for="zip">Zip:</label>
        <input type="text" name="zip">
    </div>';

//    echo "Country: <input type=\"text\" name=\"country\"> <br>\n";
    echo '<div class="form-group">
        <label for="country">Country:</label>
        <input type="text" name="country">
    </div>';

//    echo "Tel: <input type=\"text\" name=\"tel\"> <br>\n";
    echo '<div class="form-group">
        <label for="tel">Tel:</label>
        <input type="text" name="tel">
    </div>';

//    echo "Email: <input type=\"text\" name=\"email\"> <br>\n";
    echo '<div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email">
    </div>';

//    echo "Website: <input type=\"text\" name=\"website\"> <br>\n";
    echo '<div class="form-group">
        <label for="website">Website:</label>
        <input type="text" name="website">
    </div>';

    echo "<h3 class=\"heading-three\">Contact Person 1</h3>\n";


//    echo "First Name: <input type=\"text\" name=\"firstname1\"> <br>\n";
    echo '<div class="form-group">
        <label for="firstname1">First Name:</label>
        <input type="text" name="firstname1">
    </div>';

//    echo "Last Name: <input type=\"text\" name=\"lastname1\"> <br>\n";
    echo '<div class="form-group">
        <label for="lastname1">Last Name:</label>
        <input type="text" name="lastname1">
    </div>';

//    echo "Title: <input type=\"text\" name=\"title1\"> <br>\n";
    echo '<div class="form-group">
        <label for="title1">Title:</label>
        <input type="text" name="title1">
    </div>';

//    echo "Tel: <input type=\"text\" name=\"tel1\"> <br>\n";
    echo '<div class="form-group">
        <label for="tel1">Tel:</label>
        <input type="text" name="tel1">
    </div>';

//    echo "Email: <input type=\"text\" name=\"email1\"> <br>\n";
    echo '<div class="form-group">
        <label for="email1">Email:</label>
        <input type="text" name="email1">
    </div>';

    echo "<h3 class=\"heading-three\">Contact Person 2</h3>\n";

//    echo "First Name: <input type=\"text\" name=\"firstname2\"> <br>\n";
    echo '<div class="form-group">
        <label for="firstname2">First Name:</label>
        <input type="text" name="firstname2">
    </div>';
//    echo "Last Name: <input type=\"text\" name=\"lastname2\"> <br>\n";
    echo '<div class="form-group">
        <label for="lastname1">Last Name:</label>
        <input type="text" name="lastname1">
    </div>';
//    echo "Title: <input type=\"text\" name=\"title2\"> <br>\n";
    echo '<div class="form-group">
        <label for="title2">Title:</label>
        <input type="text" name="title2">
    </div>';
//    echo "Tel: <input type=\"text\" name=\"tel2\"> <br>\n";
    echo '<div class="form-group">
        <label for="tel2">Tel:</label>
        <input type="text" name="tel2">
    </div>';
//    echo "Email: <input type=\"text\" name=\"email2\"> <br>\n";
    echo '<div class="form-group">
        <label for="email2">Email:</label>
        <input type="text" name="email2">
    </div>';
    echo "<h3 class=\"heading-three\">Details</h3>\n";

//    echo "Code: <input type=\"text\" name=\"code\"> <br>\n";
    echo '<div class="form-group">
        <label for="code">Code:</label>
        <input type="text" name="code">
    </div>';
//    echo "Short Desc: <input type=\"text\" name=\"shortdesc\"> <br>\n";
    echo '<div class="form-group">
        <label for="shortdesc">Short Desc:</label>
        <textarea name="shortdesc"></textarea>
    </div>';
//    echo "Group: <input type=\"text\" name=\"group\"> <br>\n";
    echo '<div class="form-group">
        <label for="group">Group:</label>
        <input type="text" name="group">
    </div>';

//    echo "Notes: <br><textarea name=\"notes\" cols=\"50\" rows=\"15\"></textarea> <br>\n";
    echo '<div class="form-group">
        <label for="notes">Notes:</label>
        <textarea name="notes"></textarea>
    </div>';
//    echo "<textarea name=\"details\" cols=\"50\" rows=\"10\"></textarea> <br>\n";

//    echo " <input type=\"submit\" value=\"submit\"> \n ";
    echo '<div class="form-group">
        <input class="submit-btn" type="submit" value="submit">
    </div>';
    echo "<input type=\"hidden\" name=\"poster\" value=\"$userid\" > <br> ";

    echo "<input type=\"hidden\" name=\"content\" value=\"addcompany\">";

    echo "</form>";

}



//(before session)    Poster: <input type="text" size="40" name="poster"> <br>

?>


