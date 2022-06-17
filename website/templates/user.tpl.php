<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../database/classes/Restaurant.php');
?>

<?php function drawProfileForm(PDO $con, User $user) { ?>
        <div class="profileContainer">
            <aside class="profileSideBar">
                <h1>PROFILE</h1>
                <section class="profileTabsContainer">
                    <div class="buttonContainer">
                        <button onclick="showPanel(0,'#808080')">My Restaurants</button>
                        <button onclick="showPanel(1,'#808080')">Favorite Restaurants</button>
                        <button onclick="showPanel(2,'#808080')">Favorite Dishes</button>
                        <button onclick="showPanel(3,'#808080')">Settings</button>
                    </div>
                    <div class="profileTab">
                        <div class="registerButton">
                            <button id="openRegisterModal">Add new restaurant</button>
                        </div>
                        <?php
                            $myRestaurants = Restaurant::getMyRestaurants($con, $user->id);
                            drawMyRestaurants($myRestaurants);
                        ?>
                        <div class="modalContainer" id="modalContainer">
                            <div class="signUpContainer">
                                <div class="header">
                                    <h1>Add your new restaurant now!</h1>
                                </div>
                                <form action="../actions/action_add_restaurant.php" method="POST">
                                    <div class="userDetails">
                                        <div class="form-input-group">
                                            <input type="text" name="name" placeholder="Name" required>
                                            <input type="text" name="address" placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="registerButton">
                                        <input id="closeRegisterModal1" type="submit" name="submitButton" value="Add Restaurant">
                                    </div>
                                    <a id="closeRegisterModal2" class="linkToLogIn">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="profileTab"></div>
                    <div class="profileTab"></div>
                    <div class="profileTab">
                        <div id="settings" class="profileSettings">
                            <section class="form">
                                <form action="../actions/action_edit_profile.php" method="POST">
                                    <h2>User details</h2>
<!--                                    <input type="hidden" name="csrf" value="$_SESSION['csrf']">-->
                                    <input type="text" name="firstName" placeholder="First name" value="<?=$user->firstName?>">
                                    <input type="text" name="lastName" placeholder="Last name" value="<?=$user->lastName?>">

                                    <input type="submit" name="saveDetailsButton" value="Save changes">
                                </form>
                            </section>

                            <section class="form">
                                <form action="../actions/action_edit_profile.php" method="POST">
                                <h2>Update password</h2>
                                <input type="password" name="newPassword1" placeholder="New password">
                                <input type="password" name="newPassword2" placeholder="Confirm new password">
                                <input type="password" name="currentPassword" placeholder="Current password">

                                <input type="submit" name="savePasswordButton" value="Save changes">
                                </form>
                            </section>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
<?php } ?>