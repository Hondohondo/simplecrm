<form action="index.php" method="post">
    <h2 class="heading-two">
        Add New company
    </h2>
    Title: <input type="text" size="40" name="title"> <br>
    Poster: <input type="text" size="40" name="poster"> <br>
    Short Description: <br>
    <textarea name="shortdesc" cols="50" rows="5"></textarea> <br>

    <h3 class="heading-three">
        Company Summary
    </h3>
    <textarea name="summary" cols="50" rows="10"></textarea> <br>

    <h3 class="heading-three">
        Company Details
    </h3>
    <textarea name="details" id="" cols="50" rows="10"></textarea> <br>

    <input type="submit" value="submit">

    <input type="hidden" name="content" value="addcompany">

</form>
