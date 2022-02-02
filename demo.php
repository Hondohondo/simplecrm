<html>
<head>
    <title>This is my demo dynamic webpage</title>
</head>
<body>
<h1>Data records stored in the company database</h1>
<?php
//Connect to the MySQL Database and select database
$con = mysqli_connect("localhost", "root", "Hondohondo97", "company");

//Submit the query
$query = "SELECT title, poster, shortdesc FROM companies";

//Iterate through the result set
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $title = $row['title'];
    $poster = $row['poster'];
    $shortdesc = $row['shortdesc'];

    echo "<b>Title:</b>$title<br>\n";
    echo "<b>Posted by:</b>$poster<br>\n";
    echo "$shortdesc<br>\n";

}

?>
</body>

</html>


