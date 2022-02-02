

<table width="100%" cellpadding="3">

    <tr>

        <td><h3>Welcome</h3></td>

    </tr>

    <tr>

        <td><a href="index.php"><strong>Home</strong></a></td>

    </tr>

    <tr>

        <td><a href="index.php?content=login"><strong>Login to post</strong></a></td>

    </tr>

    <tr>

        <td><a href="index.php?content=register"><strong>Register for free login</strong></a></td>

    </tr>

    <tr>

        <td><hr size="1" noshade="noshade" /></td>

    </tr>

    <tr>

        <td bgcolor="#FFFF99"><a href="index.php?content=newrecipe"><strong>Post a new recipe</strong></a></td>

    </tr>

    <tr>

        <td>&nbsp;</td>

    </tr>

    <tr>

        <td>

            <form action="index.php" method="get">

                <label><font color="#663300" size="-1">search for recipe:</font> </label>

                <input name="searchFor" type="text" size="14" />

                <input name="goButton" type="submit" value="find" />

                <input name="content" type="hidden" value="search" />

            </form> </td>

    </tr>

</table>

<?php

if ($row[0] == 0)

{

echo "No comments posted yet.&nbsp;&nbsp;\n";

echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";

echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";

echo "<hr>\n";

} else

{

$totrecords = $row[0];

echo "$totrecords comments posted\n";

echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";

echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";

echo "<hr>\n";

echo "<h2>Comments:</h2>\n";

if (!isset($_GET['page']))

$thispage = 1;

else

$thispage = $_GET['page'];

$recordsperpage = 5;

$offset = ($thispage - 1) * $recordsperpage;

$totpages = ceil($totrecords / $recordsperpage);

$query = "SELECT date,poster,comment from comments where recipeid = $recipeid order by commentid desc limit $offset,$recordsperpage";

$result = mysql_query($query) or die('Could not retrieve comments: ' . mysql_error());

while($row = mysql_fetch_array($result, MYSQL_ASSOC))

{

$date = $row['date'];

$poster = $row['poster'];

$comment = $row['comment'];

$comment = nl2br($comment);

echo $date . " - posted by " . $poster . "\n";

echo "<br>\n";

echo $comment . "\n";

echo "<br><br>\n";

}

if ($thispage > 1)

{

$page = $thispage - 1;

$prevpage = "<a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Prev</a>";

} else

{

$prevpage = "";

}

$bar = '';

if ($totpages > 1)

{

for($page = 1; $page <= $totpages; $page++)

{

if ($page == $thispage)

{

$bar .= " $page ";

} else

{

$bar .= " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">$page</a> ";

}

}

}

if ($thispage < $totpages)

{

$page = $thispage + 1;

$nextpage = " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Next</a>";

} else

{

$nextpage = "";

}

echo "GoTo: " . $prevpage . $bar . $nextpage;

}

?>
