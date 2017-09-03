<?php
    include "../../login_form.php";
    session_destroy();
    header("Location:../../signup_form.php");
?>