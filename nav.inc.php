<h3 class="heading-three">
<!--    Welcome-->
</h3>


<?php

if(!isset($_SESSION['valid_crm_user'])) {
    echo '
    <nav>
    <ul class="nav-list">
        <li class="nav-list-item">
            <a class="nav-link teal-09" href="index.php">Home</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-login" href="index.php?content=login">Login</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-register" href="index.php?content=register">Register (for new users)</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-round" href="index.php?content=newcompany">Add New</a>
        </li>
    </ul>
</nav>';

}

//if(isset($_SESSION['valid_crm_user'])) {
else {

    $userid = $_SESSION['valid_crm_user'];

    echo '<nav>
    <ul class="nav-list">
        <li class="nav-list-item">
            <a class="nav-link teal-09" href="index.php">Home</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-login" href="index.php?content=logout"">Logout</a>
        </li>
         <li class="nav-list-item">
            <a class="btn-register" href="#">Welcome ' . $userid . '</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-round" href="index.php?content=newcompany">Add New</a>
        </li>
    </ul>
</nav>';

//    echo " <span class=\"btn-register\" href=\"index.php?content=register\">Welcome $userid</span>";
}


?>

<!--<nav>
    <ul class="nav-list">
        <li class="nav-list-item">
            <a class="nav-link teal-09" href="index.php">Home</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-login" href="index.php?content=login">Login</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-register" href="index.php?content=register">Register (for new users)</a>
        </li>
        <li class="nav-list-item">
            <a class="page-link-1" href="index.php?content=logout">Logout</a>
        </li>
        <li class="nav-list-item">
            <a class="btn-round" href="index.php?content=newcompany">Add New</a>
        </li>
    </ul>
</nav>-->

<form class="nav-form" action="index.php" method="get">
<!--    <span>Search for company:</span>-->
    <input placeholder="Search organisations" type="text" name="searchFor" class="search-bar">
    <input type="submit" name="goButton" value="find" class="search-button display-none">
    <input type="hidden" name="content" value="search">
</form>
