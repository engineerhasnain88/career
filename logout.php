<?php
session_start();

unset($_SESSION["ROW_ID"]);
unset($_SESSION["E_CNIC"]);
unset($_SESSION["E_NAME"]);
unset($_SESSION["E_MOBILE"]);
unset($_SESSION["E_EMAIL"]);

session_unset();
session_destroy();
header("Location:login.php");

?>