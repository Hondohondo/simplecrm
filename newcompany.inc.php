<?php

if(!isset($_SESSION['valid_crm_user'])) {
    echo "<h2 class='heading-three mg-bm-12'>
<span class='orange-07'>You do not have permission to post yet!</span>
</h2>\n";

    echo "Please <a class='page-link font-weight-500' href='index.php?content=register'>register (if you're a new user)</a> or <a class='page-link font-weight-500' href='index.php?content=login'>login (for return visitors)</a> to post organisations</a>\n";

} else {

    $userid = $_SESSION['valid_crm_user'];

    echo "<form class='form-register' action=\"index.php\" method=\"post\">\n";

    echo "  <h2 class=\"heading-two mg-bm-12\">Add New Company/Organisation</h2>\n";

    echo "  <h3 class=\"heading-three\">Company Info</h3>\n";


    echo '<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name">
    </div>';

    echo '<div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address">
    </div>';


    echo ' <div class="display-flex gap-24">
       <div class="form-group wd-50p">
        <label for="city">City:</label>
        <input type="text" name="city">
    </div>
    <div class="form-group wd-50p">
        <label for="state">State:</label>
        <input type="text" name="state">
    </div>
    </div> ';

//    echo "Zip: <input type=\"text\" name=\"zip\"> <br>\n";
    echo ' <div class="display-flex gap-24">    
    <div class="form-group wd-50p">
        <label for="zip">Zip:</label>
        <input type="text" name="zip">
    </div>
    <div class="form-group wd-50p">
        <label for="country">Country:</label>
        <input type="text" name="country">
    </div>
    </div>
    ';

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



    echo ' <div class="display-flex gap-24">
<div class="form-group wd-50p">
        <label for="firstname1">First Name:</label>
        <input type="text" name="firstname1">
    </div>
    
    <div class="form-group wd-50p">
        <label for="lastname1">Last Name:</label>
        <input type="text" name="lastname1">
    </div>
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

    echo ' <div class="display-flex gap-24">    
    <div class="form-group wd-50p">
        <label for="firstname2">First Name:</label>
        <input type="text" name="firstname2">
    </div>
    
    <div class="form-group wd-50p">
        <label for="lastname2">Last Name:</label>
        <input type="text" name="lastname2">
    </div>
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
    echo '<div class="form-group wd-50p">
        <label for="code">Code:</label>
        <input type="text" name="code">
    </div>';
//    echo "Short Desc: <input type=\"text\" name=\"shortdesc\"> <br>\n";
    echo '<div class="form-group">
        <label for="shortdesc">Short Desc:</label>
        <textarea name="shortdesc"></textarea>
    </div>';
//    echo "Group: <input type=\"text\" name=\"group\"> <br>\n";
    echo '<div class="form-group wd-50p">
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


