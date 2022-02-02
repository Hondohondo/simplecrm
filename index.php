<?php

    session_start();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" type="text/css" href="sass/main.css?v=6.3">
    <link rel="stylesheet" media="print" type="text/css" href="css/print.css?v=1.0" />
    <title>Simple CRM Solution -  Version 1.0</title>

</head>
<body class="body-container">

<div id="header" class="background-teal-09">
    <div class="container">
        <?php include("header.inc.php"); ?>
    </div>
</div>

<div class="display-flex flex-column min-ht-100vh">
    <div id="content" class="flex-g-1">
        <div id="nav" class="mx-wd-960 mg-center background-teal-02 bd-rd-10">
            <?php include("nav.inc.php"); ?>
        </div>

        <div id="main" class="mx-wd-960 mg-center background-teal-00">

            <?php

            if(!isset($_REQUEST['content'])) {
                include("main.inc.php");
            } else {
                $content = $_REQUEST['content'];
                $nextpage = $content . ".inc.php";
                include($nextpage);
            }
            ?>

            <!--    --><?php
            /*
                if(isset($_SESSION['valid_crm_user'])) {
                    if(!isset($_REQUEST['content'])) {
                        include("main.inc.php");
                    } else {
                        $content = $_REQUEST['content'];
                        $nextpage = $content . ".inc.php";
                        include($nextpage);
                    }

                } else {
                    echo "Please log in or register";
                }
                */?>
        </div>

        <div id="news" class="display-none">
            <?php include("news.inc.php"); ?>
        </div>
    </div>

    <div id="footer" class="">
        <?php include("footer.inc.php"); ?>
    </div>

</div>




</body>
</html>