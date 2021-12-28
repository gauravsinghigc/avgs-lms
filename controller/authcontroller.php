<?php

//require files
require '../require/modules.php';
require '../require/admin/sessionvariables.php';

//access_url 
if (isset($_REQUEST['access_url']) == null) {
 echo "<h1>ERROR</h1>
 <p>Invalid OUTPUT request is received!</p>
 <a href='../index.php'>Back to Root</a>";
 die();
} else {
 $access_url = $_REQUEST['access_url'];
}

//start activity here
//login request
if (isset($_POST['LoginRequest'])) {
 $UserPassword = $_POST['UserPassword'];
 $UserEmailId = $_POST['UserEmailId'];
 $AuthToken = IP_ADDRESS;
 //TOKEN Checking
 //valid token
 if ($AuthToken == SECURE($_POST['AuthToken'], "d")) {

  $CheckUsername = CHECK("SELECT * FROM users where UserEmailId='$UserEmailId' and UserPassword='$UserPassword'");

  if ($CheckUsername == true) {
   //get user details
   $FetchUsers = FETCH_DATA("SELECT * FROM users where UserEmailId='$UserEmailId' and UserStatus='Active'");
   $UserId = $FetchUsers['UserId'];
   $UserName = $FetchUsers['UserName'];
   $_SESSION['LOGIN_USER_ID'] = $UserId;

   setcookie("LOGIN_USER_ID", $UserId, time() + 60 * 60 * 365);
   APP_LOGS("CP_IN_SUCCESS", "New Login Received @ User : " . $UserEmailId . ", Pass : " . SECURE($UserPassword, "d",), "LOGIN");
   LOCATION("success", "Welcome $UserName, Login Successful!", DOMAIN . "/admin/dashboard");
  } else {
   APP_LOGS("CP_IN_BLOCK", "New Login Received @ User : " . $UserEmailId . ", Pass : " . SECURE($UserPassword, "d"), "LOGIN");
   LOCATION("warning", "Unable to Login into the system!", "$access_url");
  }

  //invalid token
 } else {
  APP_LOGS("CP_IN_FAILED", "New Login Received @ User : " . $UserEmailId . ", Pass : " . SECURE($UserPassword, "d"), "LOGIN");
  LOCATION("warning", "Invalid Access Token", "$access_url");
 }

 //update profile details
} elseif (isset($_POST['UpdateProfile'])) {
 $UserName = $_POST['UserName'];
 $UserPhone = $_POST['UserPhone'];
 $UserEmailId = $_POST['UserEmailId'];
 $UserUpdatedAt = date("d M, Y");
 APP_LOGS("PROFILE_UPDATED", "User Profile Updated @ $UserName, $UserPhone, $UserEmailId having UID:" . LOGIN_UserId . "", "USER_UPDATE");
 $Update = UPDATE("UPDATE users SET UserUpdatedAt='$UserUpdatedAt', UserName='$UserName', UserPhone='$UserPhone', UserEmailId='$UserEmailId' where UserId='" . LOGIN_UserId . "' ");
 RESPONSE($Update, "Profile Updated!", "Unable to Update Profile!");

 //update password 
} elseif (isset($_POST['UpdatePassword'])) {
 $UserPassword = $_POST['UserPassword'];
 $UserPassword_2 = $_POST['UserPassword_2'];
 if ($UserPassword != $UserPassword_2) {
  LOCATION("warning", "Unable to Update password!", "$access_url");
 } else {
  APP_LOGS("PASSWORD_UPDATED", "Password changed for UserID: " . LOGIN_UserId . "", "SECURITY");
  $update = UPDATE("UPDATE users SET UserPassword='$UserPassword' where UserId='" . LOGIN_UserId . "'");
  RESPONSE($update, "Password Updated Successfully!", "Unable to Update Password!");
 }
}
