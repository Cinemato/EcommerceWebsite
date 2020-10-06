<?php
    include('Partial-Files/header.php');
?>



<div class="centerText infoText">
    <p style="font-size: 18px">You need to login to be able to purchase products!</p>
</div>

<br>

<?php
    if(isset($_GET['error']))
    {
        if($_GET['error'] == "emptyfields")
            echo '<p style="color: red; margin-top: 30px; font-size: 16px; text-align:center;">Required Fields Are Empty!</p>';
        else if($_GET['error'] == "invalidmail")
            echo '<p style="color: red; margin-top: 30px; font-size: 16px; text-align:center;">Invalid Email!</p>';
        else if($_GET['error'] == "passwordcheck")
            echo '<p style="color: red; margin-top: 30px; font-size: 16px; text-align:center;">Passwords Are Not Equal!</p>';
        else if($_GET['error'] == "mailtaken")
            echo '<p style="color: red; margin-top: 30px; font-size: 16px; text-align:center;">Account Already Exists!</p>';
    }
?>

<div class="centerInput">

    <div class="centerText" style="padding: 120px 30px; margin-top: 30px">

        <h1>Sign-up</h1>
        <div class="login">
            <form action="Database/register.db.php" method="post" class="login">
                <input type="text" placeholder="Email" name="email" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ""?>">
                <input type="password" placeholder="Password" name="pass">
                <input type="password" placeholder="Confirm Password" name="confirm-pass">
                <br>
                <button type="submit" class="btn" style="border-radius: 5px; margin: 7px;" name="register-submit">Submit</button>
            </form>

            <a href="login.php" style="margin-top: 50px;">Login</a>
        </div>
    </div>

</div>






<?php
    include('Partial-Files/footer.php');
?>
