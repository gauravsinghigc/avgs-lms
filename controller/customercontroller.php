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

//save files
if (isset($_POST['SaveCustomer'])) {

 //customer details
 $CustomerType = $_POST['CustomerType'];
 $CustomerFirstname = $_POST['CustomerFirstname'];
 $Customerlastname = $_POST['Customerlastname'];
 $CompanyName = $_POST['CompanyName'];
 $CustomerDisplayName = $_POST['CustomerDisplayName'];
 $CustomerWorkPhone = $_POST['CustomerWorkPhone'];
 $CustomerMobilePhone = $_POST['CustomerMobilePhone'];
 $CustomerEmailId = $_POST['CustomerEmailId'];
 $CustomerWebsite = $_POST['CustomerWebsite'];
 $CustomerCreatedAt = date("d M, Y");
 $CustomerRemarks = SECURE($_POST['CustomerRemarks'], "e");
 $CustomerCreatedBy = LOGIN_UserId;
 $CustomerProfileImage = "user.png";
 $CustomerSecondaryEmail = $_POST['CustomerSecondaryEmail'];
 $CustomerOtherEmail = $_POST['CustomerOtherEmail'];
 $CustomerSalutation = $_POST['CustomerSalutation'];

 $SaveCustomer = SAVE("customers", ["CustomerType", "CustomerCreatedAt", "CustomerSalutation", "CustomerFirstname", "Customerlastname", "CompanyName", "CustomerDisplayName", "CustomerWorkPhone", "CustomerMobilePhone", "CustomerEmailId", "CustomerWebsite", "CustomerCreatedBy", "CustomerRemarks", "CustomerSecondaryEmail", "CustomerOtherEmail"]);
 $FetchCustomers = SELECT("SELECT * FROM customers where CustomerWorkPhone='$CustomerWorkPhone' and CustomerMobilePhone='$CustomerMobilePhone' and CustomerEmailId='$CustomerEmailId'");
 $fetchdata = mysqli_fetch_array($FetchCustomers);
 $CustomerId = $fetchdata['CustomerId'];

 //save shipping address
 $CustomerStreetAddress1 = SECURE($_POST['CustomerStreetAddress1'], "e");
 $CustomerCity1 = $_POST['CustomerCity1'];
 $CustomerState1 = $_POST['CustomerState1'];
 $CustomerCountry1 = $_POST['CustomerCountry1'];
 $CustomerPincode1 = $_POST['CustomerPincode1'];

 $SaveCustomerShippingAddress = SAVE("customer_shipping_address", ["CustomerId", "CustomerStreetAddress1", "CustomerCity1", "CustomerState1", "CustomerCountry1", "CustomerPincode1"]);

 //save billing address
 $CustomerStreetAddress = SECURE($_POST['CustomerStreetAddress'], "e");
 $CustomerCity = $_POST['CustomerCity'];
 $CustomerState = $_POST['CustomerState'];
 $CustomerCountry = $_POST['CustomerCountry'];
 $CustomerPincode = $_POST['CustomerPincode'];

 $SaveCustomerBillingAddress = SAVE("customer_billing_address", ["CustomerId", "CustomerStreetAddress", "CustomerCity", "CustomerState", "CustomerCountry", "CustomerPincode"]);


 //customer contact person
 foreach ($_POST['CustomerContactPersonName'] as $key => $value) {
  $CustomerContactPersonName = $_POST['CustomerContactPersonName'][$key];
  $CustomerContactPersonPhone = $_POST['CustomerContactPersonPhone'][$key];
  $CustomerContactPersonEmailId = $_POST['CustomerContactPersonEmailId'][$key];
  $CustomerContactPersonDesignation = $_POST['CustomerContactPersonDesignation'][$key];
  $CustomerContactPersonDepartment = $_POST['CustomerContactPersonDepartment'][$key];
  $Save = SAVE("customer_contact_person", ["CustomerContactPersonName", "CustomerId", "CustomerContactPersonPhone", "CustomerContactPersonEmailId", "CustomerContactPersonEmailId", "CustomerContactPersonDesignation", "CustomerContactPersonDepartment"]);
 }

 RESPONSE($Save, "Customer Saved Succesfully!", "Unable to save customer!");
}
