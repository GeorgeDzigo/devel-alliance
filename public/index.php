<?php
$root = $_SERVER['DOCUMENT_ROOT'] . '/delliance';

require("$root/public/parts/top.php");
?>
<div class="form-container">
    <div class="form-wrapper">
        <form action="#" method="POST" id="sign-up">
            <div class="input-wrapper">
                <label for="firstname">
                    First name
                </label>
                <input type="text" id="firstname" name="firstname" class="input" required>

            </div>

            <div class="input-wrapper">
                <label for="lastname">
                    Last name
                </label>
                <input type="text" id="lastname" name="lastname" class="input" required>

            </div>

            <div class="input-wrapper">
                <label for="email">
                    Email
                </label>
                <input type="email" id="email" name="email" class="input" required>
            </div>

            <div class="input-wrapper">
                <label for="password">
                    Password
                </label>
                <input type="text" id="password" name="password" class="input" required>
            </div>

            <div class="input-wrapper">
                <label for="repeat_password">
                    Repeat Password
                </label>
                <input type="text" id="repeat_password" name="repeat_password" class="input" required>
            </div>
        </form>
    </div>
</div>
<?php
require("$root/public/parts/bottom.php");
?>