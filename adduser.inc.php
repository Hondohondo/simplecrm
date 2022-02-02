<?php

$con = mysqli_connect("localhost", "root", "Hondohondo97", "company");

if (!$con) {
    echo "<h2 class=\"heading-two\">Sorry, we cannot process your request at this time, please try again later</h2>\n";

    echo "<a href=\"index.php?content=register\">Try again</a><br>\n";

    echo "<a href=\"index.php\">Return to Home</a>\n";

    exit;

}

//HTML variables from the registration form are assigned to PHP variables
$userid = $_POST['userid'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$baduser = 0;

//The code then performs four different checks on the data the visitor enters into the form before attemmpting to create the new user account

//1. Check if userid was entered
if (trim($userid) == '') {

    echo "<h2 class=\"heading-two\">Sorry, you must enter a user name.</h2><br>\n";

    echo "<a href=\"index.php?content=register\">Try again</a><br>\n";

    echo "<a href=\"index.php\">Return to Home</a>\n";

    $baduser = 1;
}

//2. Check if password was entered
if(trim($password) == '') {
    echo "<h2 class='heading-two'>Sorry, you must enter a password.</h2>";
    echo "<a href='index.php?content=register'>Try again</a><br>\n";
    echo "<a href='index.php'>Return to Home</a>\n";
    $baduser = 1;
}

//3. Check if password and confirm match
if ($password != $password2) {
    echo "<h2 class='heading-two'>Sorry, the passwords you entered did not match.</h2><br>\n";
    echo "<a href='index.php?content=register'>Try again</a><br>\n";
    echo "<a href='index.php'>Return to Home</a>\n";
    $baduser = 1;
}

//4. Check if userid is already in database
$query = "SELECT userid from users where userid = '$userid'";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//if ($row['userid'] == $userid) { --doesn't work in PHP 8
if (isset($row['userid'])){ //This checks if the userid was returned in the SELECT query, which will tell us if the user account is already in the users table.
    echo "<h2 class='heading-two'>Sorry, that user name is already taken.</h2><br>\n";
    echo "<a href='index.php?content=register'>Try again</a><br>\n";
    echo "<a href='index.php'>Return to Home</a>\n";

    $baduser = 1;

}

if ($baduser != 1) {
    //Everything passed, enter userid in database

    $query = "INSERT into users VALUES ('$userid', MD5('$password'), '$fullname', '$email')";

    $result = mysqli_query($con, $query) or die ('Sorry we are unable to process your request');

    if ($result) {
        $_SESSION['valid_crm_user'] = $userid;

        echo "<h2 class='heading-two'>Your registration request has been approved and you are now logged in!</h2>\n";

        echo "<a href='index.php'>Return to Home</a>\n";

        header("refresh: 0.1");

        exit;

    } else {

        echo "<h2 class='heading-two'>Sorry, there was a problem processing your login request</h2><br>\n";

        echo "<a href='index.php?content=register'>Try again</a><br>\n";

        echo "<a href='index.php'>Return to Home</a>\n";

    }
}

?>
