<?php
    include('Partial-Files/header.php');
?>


<div class="container">
    <div class="title">
        <h2>Contact Us</h2>
    </div>
    <?php
        if(isset($_GET['sent']))
        {
            echo '<div class="centerText infoText" style="border: 1px solid #36DC3A; background: #36DC3A">
                    <p style="font-size: 18px; color: white">Message Sent Successfully!<br><br>We Will Respond To You Shortly</p>
                 </div>';
        }
    ?>
    <div class="centerText">

        <p>You can email us manually using our email <b>foold-support@gmail.com</b>, or you can use the form below</p>
        <hr style="width: 300px; margin:20px auto;">
        <br>
        <?php
        if(isset($_GET['error']))
        {
            if($_GET['error'] == "emptyfields")
                echo '<p style="color: red; margin: 20px 0px; font-size: 16px; text-align:center;">Required Fields Are Empty!</p>';
        }


        ?>
        <div class="checkoutContainer" style="max-width: 420px;">
            <form action="Database/message.db.php" method="post">
                <input type="text" placeholder="Full Name" name="name" style="height: 40px" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ""?>">
                <input type="text" placeholder="Email" name="email" style="height: 40px" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ""?>">
                <input type="text" placeholder="Subject" name="subject" style="height: 40px" value="<?php echo isset($_GET['subject']) ? $_GET['subject'] : ""?>">
                <textarea name="msg" cols="30" rows="10" style="height: 200px; resize: none;" placeholder="Message"><?php echo isset($_GET['msg']) ? $_GET['msg'] : ""?></textarea>
                <button type="submit" class="btn" style="border-radius: 5px; margin: 7px; width: 97.3%;" name="msg-submit">Send</button>
            </form>


        </div>

    </div>
</div>










<?php
    include('Partial-Files/footer.php');
?>
