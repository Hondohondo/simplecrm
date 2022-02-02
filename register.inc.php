<h3 class="heading-three">
    Join the Simple CRM!
</h3>

<p class="para mg-bm-12">
    Register to easily manage your customers and clients information
</p>

<!--<h3 class="heading-three">
    Please enter the following information
</h3>-->

<form class="form-register" action="index.php" method="post">
    <div class="form-group wd-70p">
        <label for="userid">User Name:</label>
        <input type="text" name="userid">
    </div>

    <div class="form-group wd-70p">
        <label for="password">Password:</label>
        <input type="password" name="password">
    </div>

    <div class="form-group wd-70p">
        <label for="password2">Confirm Password:</label>
        <input type="password" name="password2">
    </div>

    <div class="form-group wd-70p">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname">
    </div>

    <div class="form-group wd-70p">
        <label for="email">Email:</label>
        <input type="email" name="email">
    </div>

    <div class="form-group wd-70p">
        <input class="submit-btn" type="submit" value="Submit">
    </div>

    <input type="hidden" name="content" value="adduser">

</form>
