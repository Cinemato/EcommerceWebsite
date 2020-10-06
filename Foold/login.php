<?php
    include('Partial-Files/header.php');
?>

<?php
    if(isset($_GET['signup']))
    {
        echo '<div class="centerText infoText" style="border: 1px solid #36DC3A; background: #36DC3A">
                    <p style="font-size: 18px; color: white">Registration Successful! You Can Login Now!</p>
              </div>';
    }
    else
    {
        echo '<div class="centerText infoText">
                    <p style="font-size: 18px">You need to login to be able to purchase products!</p>
             </div>';
    }

?>



<br>

<?php
    if(isset($_GET['error']))
    {
        if($_GET['error'] == "emptyfields")
            echo '<p style="color: red; margin-top: 30px; font-size: 16px; text-align:center;">Required Fields Are Empty!</p>';
        else if($_GET['error'] == "wrongmail")
            echo '<p style="color: red; margin-top: 30px; font-size: 16px; text-align:center;">Wrong Email!</p>';
        else if($_GET['error'] == "wrongpass")
            echo '<p style="color: red; margin-top: 30px; font-size: 16px; text-align:center;">Wrong Password!</p>';
    }
?>


<div class="centerInput">
    <div class="centerText" style="padding: 120px 30px; margin-top: 30px;">
        <h1>Login</h1>
        <div class="login">
            <form action="Database/login.db.php" method="post" class="login">
                <input type="text" name="email" placeholder="Email" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ""?>">
                <input type="password" name="pass" placeholder="Password">
                <br>
                <button type="submit" class="btn" style="border-radius: 5px; margin: 7px;" name="login-submit">Submit</button>
            </form>

            <a href="register.php" style="margin-top: 50px;">Sign-up</a>
        </div>
    </div>
</div>






<?php
    include('Partial-Files/footer.php');
?>
