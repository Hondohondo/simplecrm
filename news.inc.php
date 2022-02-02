<h3 class="heading-three">
    Recent News/Activities
</h3>

<?php

$con = mysqli_connect("localhost", "root", "Hondohondo97", "company") or die('Could not connect to the server');

$query = "SELECT date, title, article from news order by date desc limit 0,2";

$result = mysqli_query($con, $query) or die('Could not get recent news/activities');

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $date = $row['date'];
    $title = $row['title'];
    $article = $row['article'];
    echo "<br>$date - <b>$title</b> <br>$article<br><br>";
}

?>