<?php
declare(strict_types = 1);
?>

<?php function drawProfileForm(User $user) { ?>
        <div class="profileContainer">
            <aside class="profileSideBar">
                <h1>PROFILE</h1>
                <section class="profileLinks">
                    <ul>
                        <li><a href="#myRestaurants">My Restaurants</a></li>
                        <li><a href="#favoriteRestaurants">Favorite Restaurants</a></li>
                        <li><a href="#favoriteDishes">Favorite Dishes</a></li>
                        <li><a href="#settings">Settings</a></li>
                    </ul>
                </section>
            </aside>
            </ivd>
            <div id="settings" class="profileSettings">
                <section class="form">
                    <form action="../actions/action_edit_profile.php" method="POST">
                        <h2>User details</h2>
                        <input type="text" name="firstName" placeholder="First name" value="<?=$user->firstName?>">
                        <input type="text" name="lastName" placeholder="Last name" value="<?=$user->lastName?>">

                        <input type="submit" name="saveDetailsButton" value="Save changes">
                    </form>
                </section>

                <section class="form">
                    <form <!--action="../actions/action_edit_profile.php"--> method="POST">
                        <h2>Update password</h2>
                        <input type="password" name="newPassword1" placeholder="New password">
                        <input type="password" name="newPassword2" placeholder="Confirm new password">
                        <input type="password" name="currentPassword" placeholder="Current password">

                        <input type="submit" name="savePasswordButton" value="Save changes">
                    </form>
                </section>
            </div>
        </div>
<?php } ?>