<?php

require("parts/top.php");
?>

<div class="success-wrapper">
    <div class="success-box">
        <div class="success-message"> 
            Welcome, you registered successfully <?= $_SESSION['firstname'] ?>
        </div>
    </div>
</div>

<?php
require("parts/bottom.php");
?>