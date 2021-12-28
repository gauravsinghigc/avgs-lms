<?php
if (isset($_SESSION['LOGIN_CustomerId'])) {
 $LOGIN_CustomerId = $_SESSION['LOGIN_CustomerId'];

 define("LOGIN_CustomerId", $_SESSION['LOGIN_CustomerId']);
 define("LOGIN_CustomerName", FETCH("SELECT * FROM customers where CustomerId='$LOGIN_CustomerId'", "CustomerName"));
}
