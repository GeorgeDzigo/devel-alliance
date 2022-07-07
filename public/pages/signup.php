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
            <ul class="error-holder" id="general">
            </ul>
        </form>
    </div>
</div>

<div class="registered-users-wrapper">
    <div class="registered-users-container">
        <table class="registered-users-table">
            <tr class="registered-users-tr">
                <th class="registered-users-th">ID</th>
                <th class="registered-users-th">First Name</th>
                <th class="registered-users-th">Last Name</th>
                <th class="registered-users-th">Email</th>
                <th class="registered-users-th">Password</th>
                <th class="registered-users-th">actions</th>
            </tr>
            <?php if (count($users) > 0) { ?>
                <?php foreach ($users as $user) { ?>

                    <tr class="registered-users-tr" id="user_col_<?= $user['id'] ?>">
                        <td class="registered-users-td"><?= $user['id'] ?></td>
                        <td class="registered-users-td"><?= $user['firstname'] ?></td>
                        <td class="registered-users-td"><?= $user['lastname'] ?></td>
                        <td class="registered-users-td"><?= $user['email'] ?></td>
                        <td class="registered-users-td"><?= $user['password'] ?></td>
                        <td class="registered-users-td">
                            <button onclick="removeUser(<?= $user['id'] ?>)" id="btn-<? $user['id'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
<script src="js/validation.js"></script>

<?php
require("parts/bottom.php");
?>