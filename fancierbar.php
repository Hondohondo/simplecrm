<?php

/*
 * Other sites provide a textbox for visitors to enter a desired page number and a Go button that jumps directly to that page. This method requires just a simple HTML form that passes the page number as an HTML variable using the GET method:
 * You can use this PHP code to replace the code that builds the navigation bar for the comments. The hidden fields are important, as you need to remember to pass along the content and id HTML variables.
 *
 * */


echo "Displaying page $thispage of $totpages";

echo "<form action=\"index.php\" method=\"get\">";

echo "<input type=\"hidden\" name=\"content\" value=\"showrecipe\">";

echo "<input type=\"hidden\" name=\"id\" value=$recipeid>";

echo "Jump to Page:<input type=\"text\" size=\"2\" name=\"page\">";

echo "<input type=\"submit\" value=\"Go\">";

?>