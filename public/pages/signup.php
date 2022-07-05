<?php

require("parts/top.php");
?>

<div class="form-wrapper">
    <div class="form-container">
        <h1 class="form-title">
            Sign Up
        </h1>

        <form action="/sign-up" method="POST" id="sign-up">
            <div class="input-wrapper">
                <input type="text" id="firstname" name="firstname" class="input" placeholder="Enter Your First name" required>
            </div>

            <div class="input-wrapper">
                <input type="text" id="lastname" name="lastname" class="input" placeholder="Enter Your Last name" required>

            </div>

            <div class="input-wrapper">
                <input type="email" id="email" name="email" class="input" placeholder="Enter Your Email" required>
            </div>

            <div class="input-wrapper">
                <input type="text" id="password" name="password" class="input" placeholder="Enter Your Password" required>
            </div>

            <div class="input-wrapper">
                <input type="text" id="repeat_password" name="repeat_password" class="input" placeholder="Repeat Password" required>
            </div>

            <button type="submit" class="form-submit-btn">Register</button>
        </form>
    </div>
</div>

<?php
require("parts/bottom.php");
?>