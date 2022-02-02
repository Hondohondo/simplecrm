<?php

    $con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die ("Could not connect");

    //retrieve html variables from the form and save them to php variables
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    //create an SQL query to check the userid and password values
    $query = "SELECT userid from users where userid = '$userid' and password = MD5('$password')";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0) {

        echo "<h2 class='heading-two'>Sorry, your user account was not validated.</h2><br>\n";

        echo "<a href='index.php?content=login'>Try again</a><br>\n";

        echo "<a href='index.php'>Return to Home</a>\n";

    } else {

        //session cookie variable is set and the program stores the username in the session cookie data
        $_SESSION['valid_crm_user'] = $userid;

        //I want to display welcome username...
//        echo "$userid";

        echo "<h2 class='heading-two'>Your user account has been validated, you can now use the CRM</h2><br>\n";



        echo "<a href='index.php'>Return to Home</a>\n";

        header("refresh: 0.1");


    }


?>
