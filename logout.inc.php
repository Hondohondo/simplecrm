<?php

if (isset($_SESSION['valid_crm_user']))
{
    unset($_SESSION['valid_crm_user']);
    header("refresh: 0.1");
    echo "<h2 class='heading-two'>You are now logged out.</h2>\n ";

} else {

    echo "<h2 class='heading-two'>You are not currently logged in</h2>\n";
}

?>