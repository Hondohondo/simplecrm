<h2 class="heading-two">
    The Latest Organisations
</h2>

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

//mysql_connect PHP function to connect to the mysql server, it takes parameters such as hostname of the mysql server, userid used to log into the server, and the password required for userid.
//$con = mysql_connect("localhost", test, test) or die ('Sorry, could not connect to the database server');

// request access to the recipe database through the connection. MySQL allows you to access only one database at a time per connection.
// Use the mysql_select_db function to specify the database name, along with the PHP variable representing the opened connection. This result doesn't need to be saved in a variable, as PHP remembers the connected database for all future database functions.
//mysql_select_db("company", $con) or die ('Sorry, could not connect to database');



//$con = mysqli_connect("137.184.154.229", "root", "password", "company") or die('Sorry, could not connect to the database or server');
$con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die('Sorry, could not connect to the database or server');

//After creating the connection and specifying a database, you'll need to create your SQL query. Then you'll assign the query to a PHP variable as a text string.
$query = "SELECT companyid, title, poster, shortdesc from companies order by companyid desc limit 0,5";

//Once you create the query string, it's time to send it to the MySQL server using mysql_query function
$result = mysqli_query($con, $query) or die('Sorry, could not get companies at this time');

//If the query is successful, the $result variable contains information about the result set returned by the query (but not the actual data yet).

//You can perform several functions with the information contained in the $result variable. The program uses the mysql_num_rows() PHP function to check how many rows of data the server will return from the query. If no rows are returned, then there's no data in the query result.
if(mysqli_num_rows($result) == 0) {
    echo "<h3 class=\"heading-three\">Sorry, there are no companies at this time, please try back later. </h3> ";

    //If there's data in the result set, you need to perform another step to extract it. The mysql_fetch_array() function retrieves the result set from the query and places it into an array variable.
    //This function uses two parameters: the variable that contains the result set information, and a constant value that defines how the array is referenced:
} else {

    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $companyid = $row['companyid'];
        $title = $row['title'];
        $poster = $row['poster'];
        $shortdesc = $row['shortdesc'];

        echo "<a href=\"index.php?content=showcompany&id=$companyid\">$title</a> submitted by $poster<br>\n";

        echo "$shortdesc<br><br>\n";

    }
}

?>