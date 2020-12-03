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
            echo '<div class="centerText infoText">
                    <p>Information Saved Successfully!</p>
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
                    <input type="text" placeholder="First Name" name="first_name" value="<?php echo $user_data['first_name'] ?? "" ?>">
                </div>
                <div class="oneInput" style="display: flex;">
                    <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $user_data['last_name'] ?? "" ?>">
                </div>
            </div>
            <div class="infoTab">
                <div class="subtitle">
                    <h2>Delivery Details</h2>
                </div>
                <div class="oneInput" style="display: flex;">
                    <input type="text" placeholder="Address" name="address" value="<?php echo $user_data['address'] ?? "" ?>">
                </div>
                <div class="oneInput" style="display: flex;">
                    <input type="text" placeholder="City" name="city" value="<?php echo $user_data['city'] ?? "" ?>">
                </div>
                <div class="oneInput" style="display: flex;">
                    <input type="tel" placeholder="Phone" name="phone" value="<?php echo $user_data['phone'] ?? "" ?>">
                </div>
            </div>
            <button type="submit" class="btn saveBtn" name="save-submit">Save</button>
        </form>
        <form action="Database/logout.db.php">
            <button type="submit" class="btn logoutBtn" name="logout-submit">Logout</button>
        </form>
    </div>

</div>






<?php
    include('Partial-Files/footer.php');
?>
