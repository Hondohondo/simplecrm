<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>The Beatles: WHILE LOOP</h2>
<?php
$counter = 0;$thebeatles = array("John", "Paul", "George", "Ringo");
while ($counter < 4)
{
    echo "one member of the Beatles is $thebeatles[$counter]<br>\n";
    $counter = $counter + 1;
}
?>

<h2>The Beatles: FOR LOOP</h2>
<?php
$thebeatles = array("John", "Paul", "George", "Ringo");
for($counter = 0; $counter < 4; $counter++)
{
    echo "one member of the Beatles is $thebeatles[$counter]<br>\n";
}
?>



</body>
</html>
