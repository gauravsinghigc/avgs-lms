<?php

//require files
require '../require/modules.php';

//access_url 
if (isset($_REQUEST['access_url']) == null) {
 echo "<h1>ERROR</h1>
 <p>Invalid OUTPUT request is received!</p>
 <a href='../index.php'>Back to Root</a>";
 die();
} else {
 $access_url = $_REQUEST['access_url'];
}

//save new currenciesW
if (isset($_POST['createnewcurrencies'])) {
 $currencycode = $_POST['currencycode'];
 $currencysymbole = $_POST['currencysymbole'];
 $currencyname = $_POST['currencyname'];
 $currenciedecimalplaces = $_POST['currenciedecimalplaces'];
 $currencyformates = $_POST['currencyformates'];
 $currencydefault = "false";

 $Save = SAVE("currencies", ["currencycode", "currencysymbole", "currencyname", "currenciedecimalplaces", "currencyformates", "currencydefault"]);
 RESPONSE($Save, "New Currencie Saved Successfully!", "Unable to save new currencies!");

 //update currencies
} else if (isset($_POST['udpatecurrencies'])) {
 $currencycode = $_POST['currencycode'];
 $currencysymbole = $_POST['currencysymbole'];
 $currencyname = $_POST['currencyname'];
 $currenciedecimalplaces = $_POST['currenciedecimalplaces'];
 $currencyformates = $_POST['currencyformates'];
 $updateid = $_SESSION['VIEW_CUR_ID'];
 $currencydefault = $_POST['currencydefault'];

 $Update = UPDATE("UPDATE currencies SET currencydefault='false'");
 if ($currencydefault == null) {
  $currencydefault = "false";
 } else {
  $currencydefault = $currencydefault;
 }

 $Save = UPDATE("UPDATE currencies SET currencycode='$currencycode', currencysymbole='$currencysymbole', currencyname='$currencyname', currenciedecimalplaces='$currenciedecimalplaces', currencyformates='$currencyformates', currencydefault='$currencydefault' where currenciesid='$updateid'");
 RESPONSE($Save, "Currency Updated!", "Unable to update currencies!");
}
