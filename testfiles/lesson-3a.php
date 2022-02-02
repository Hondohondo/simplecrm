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

<h1>Random number test</h1>

<?php
$var = rand(0, 100);
if ($var > 50)
{
    echo "<h2>The value is big: $var</h2>\n";
} else if ($var  > 25)
{    echo "<h2>The value is medium: $var</h2>\n";
} else
{
    echo "<h2>The value is small: $var</h2>\n";
}
?>



</body>
</html>
