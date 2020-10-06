<?php
    include('Partial-Files/header.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['save-submit']))
        {
            $user->updateData($_SESSION['user_id'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['city'], $_POST['phone']);
        }
    }

    $user_data = $user->getUser($_SESSION['user_id']);
?>

<div class="container">
    <div class="title">
        <h2>Your Account</h2>
    </div>
    <?php
        if(isset($_GET['save']))
        {
            echo '<div class="centerText infoText" style="border: 1px solid #36DC3A; background: #36DC3A">
                    <p style="font-size: 18px; color: white">Information Saved Successfully!</p>
                 </div>';
        }

    ?>
    <div class="checkoutContainer accountPage">
        <form method="post">
            <div class="infoTab">
                <div class="subtitle">
                    <h2>User Details</h2>
                </div>
                <div class="oneInput" style="display: flex;">
                    <img src="Images/name-icon.png" width="25px" height="25px" style="margin-top: 17px">
                    <input type="text" placeholder="First Name" name="first_name" value="<?php echo $user_data['first_name'] ?? "" ?>">
                </div>
                <div class="oneInput" style="display: flex;">
                    <img src="Images/name-icon.png" width="25px" height="25px" style="margin-top: 17px">
                    <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $user_data['last_name'] ?? "" ?>">
                </div>
            </div>
            <div class="infoTab">
                <div class="subtitle">
                    <h2>Delivery Details</h2>
                </div>
                <div class="oneInput" style="display: flex;">
                    <img src="Images/map-icon.png" width="25px" height="25px" style="margin-top: 17px">
                    <input type="text" placeholder="Address" name="address" value="<?php echo $user_data['address'] ?? "" ?>">
                </div>
                <div class="oneInput" style="display: flex;">
                    <img src="Images/city-icon.png" width="25px" height="25px" style="margin-top: 17px">
                    <input type="text" placeholder="City" name="city" value="<?php echo $user_data['city'] ?? "" ?>">
                </div>
                <div class="oneInput" style="display: flex;">
                    <img src="Images/phone-icon.png" width="25px" height="25px" style="margin-top: 17px">
                    <input type="tel" placeholder="Phone" name="phone" value="<?php echo $user_data['phone'] ?? "" ?>">
                </div>
            </div>
            <button type="submit" class="btn" style="border-radius: 5px; margin: 7px; width: 97.3%;" name="save-submit">Save</button>
        </form>
        <form action="Database/logout.db.php">
            <button type="submit" class="btn logoutBtn" style="border-radius: 5px; margin: 7px; width: 97.3%;" name="logout-submit">Logout</button>
        </form>
    </div>

</div>






<?php
    include('Partial-Files/footer.php');
?>
