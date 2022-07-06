<?php

require("parts/top.php");
?>

<div class="form-wrapper">
    <div class="form-container">
        <h1 class="form-title">
            Sign Up
        </h1>

        <form method="POST" id="sign-up">
            <div class="input-wrapper">
                <input type="text" id="firstname" name="firstname" class="input" placeholder="First name" required>
                <ul class="error-holder">
                </ul>
            </div>

            <div class="input-wrapper">
                <input type="text" id="lastname" name="lastname" class="input" placeholder="Last name" required>
                <ul class="error-holder">
                </ul>

            </div>

            <div class="input-wrapper">
                <input type="email" id="email" name="email" class="input" placeholder="Email" required>
                <ul class="error-holder">
                </ul>
            </div>

            <div class="input-wrapper">
                <input type="text" id="password" name="password" class="input" placeholder="Password" required>
                <ul class="error-holder">
                </ul>
            </div>

            <div class="input-wrapper">
                <input type="text" id="repeat_password" name="repeat_password" class="input" placeholder="Repeat Password" required>
                <ul class="error-holder">
                </ul>
            </div>

            <button type="submit" class="form-submit-btn">Register</button>
        </form>
    </div>
</div>

<script src="js/validation.js"></script>

<?php
require("parts/bottom.php");
?>