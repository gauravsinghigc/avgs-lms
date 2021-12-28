<?php
//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "NEW Quotation";

//page activity
if (isset($_POST['QuotationReceiver'])) {
  $_SESSION['QuotationReceiver'] = $_POST['QuotationReceiver'];
  $QuotationReceiver = $_SESSION['QuotationReceiver'];
} elseif (isset($_SESSION['QuotationReceiver'])) {
  $_SESSION['QuotationReceiver'] = $_SESSION['QuotationReceiver'];
  $QuotationReceiver = $_SESSION['QuotationReceiver'];
} else {
  $QuotationReceiver = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include '../../include/admin/header_files.php'; ?>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include '../../include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->
          <div class="panel">
            <div class="panel-heading">
              <div class="flex-s-b">
                <div class="btn-group btn-group-sm">
                  <a href="<?php echo DOMAIN; ?>/admin/quotations/index.php" class="btn btn-sm btn-primary square btn-labeled fa fa-angle-left"> Back to All</a>
                  <a href="<?php echo DOMAIN; ?>/admin/quotations/files/index.php" class="btn btn-sm btn-info square btn-labeled fa fa-file">All Attachements</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="flex-s-b">
                <h4 class="m-b-0"><?php echo $PageName; ?></h4>
              </div>
              <div class="row m-t-10">
                <form class="form" method="POST">
                  <div class="row">
                    <div class="col-md-12">
                      <h5>Customer Details</h5>
                    </div>
                    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-8">
                      <select type="text" onchange="form.submit()" name="QuotationReceiver" class="form-control-2" required="" placeholder="Enter Person Name">
                        <option value="0">Select Customer</option>
                        <?php
                        if (LOGIN_UserRoles == "Admin") {
                          $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers", true);
                        } else {
                          $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers where CustomerCreatedBy='" . LOGIN_UserId . "'", true);
                        }
                        if ($AllCustomers != null) {
                          foreach ($AllCustomers as $Customers) { ?>
                            <option value="<?php echo $Customers->CustomerId; ?>"><?php echo $Customers->CustomerDisplayName; ?></option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-right">
                      <a href="#" onclick="Databar('addcustomers')" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> New Customer</a>
                    </div>
                  </div>
                </form>
              </div>

              <?php if ($QuotationReceiver != null) { ?>
                <div class="row">
                  <?php
                  $AllCustomers = FetchConvertIntoArray("SELECT * FROM customers where CustomerId='$QuotationReceiver'", true);
                  if ($AllCustomers != null) {
                    foreach ($AllCustomers as $Customers) {
                  ?>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="shadow-lg br10">
                          <div class="flex-s-b">
                            <div class="img-section-2">
                              <img src="<?php echo STORAGE_URL; ?>/customers/img/profile/<?php echo $Customers->CustomerProfileImage; ?>" alt="<?php echo $Customers->CustomerFirstname; ?>" title="<?php echo $Customers->CustomerFirstname; ?>" class="w-100 p-1r">
                            </div>
                            <div class="item-details-2 p-1">
                              <p class="lh-1-2 m-b-2">
                                <span class="fs-12 bold">
                                  <b><?php echo $Customers->CustomerDisplayName; ?></b>
                                </span><br>
                                <span class="fs-12">
                                  <i class="fa fa-user text-primary"></i> <?php echo $Customers->CustomerFirstname; ?> <?php echo $Customers->Customerlastname; ?>
                                </span>
                                <br>
                                <span class="fs-11 text-grey">
                                  <span><i class="fa fa-phone text-primary"></i> <?php echo $Customers->CustomerWorkPhone; ?>, <?php echo $Customers->CustomerWorkPhone; ?></span><br>
                                  <span><i class="fa fa-envelope-o text-danger"></i> <?php echo $Customers->CustomerEmailId; ?></span><br>
                                  <span><i class="fa fa-globe text-info"></i> <?php echo $Customers->CustomerWebsite; ?></span>
                                  <br>
                                  <i CLASS="text-right fs-10">Created By <?php echo FETCH("SELECT * FROM users where UserId='" . $Customers->CustomerCreatedBy . "'", "UserName"); ?></i>
                                </span>
                              </p>
                              <a href="#" class="btn-sm text-primary"><i class="fa fa-edit"></i> Edit</a>
                              <a href="#" class="btn-sm text-danger"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
              <?php } ?>

              <div style="display:none;" id="addcustomers" class="shadow-lg br5 p-b-10">
                <form action="../../controller/customercontroller.php" method="POST">
                  <?php FormPrimaryInputs(true); ?>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-1">
                      <div class="input-block">
                        <h4>Customer Details</h4>
                        <div class="form-group form-group-2 flex-s-b">
                          <label>Customer type <?php echo $req; ?></label>
                          <div class="raw-inputs" onclick="tax()">
                            <span>
                              <input type="radio" name="CustomerType" id="taxationvalue1" value="Company" checked=""> Company
                            </span>
                            <span>
                              <input type="radio" name="CustomerType" id="taxationvalue2" value="Individual"> Individual
                            </span>
                          </div>
                        </div>

                        <div class="form-group form-group-2 flex-s-b">
                          <label>Primay Contact Person <?php echo $req; ?></label>
                          <div class="raw-inputs">
                            <span>
                              <select class="form-control-3" id="salute" name="CustomerSalutation" required="">
                                <?php InputOptions(["Mr.", "Mrs.", "Ms.", "Miss", "Dr."]) ?>
                              </select>
                            </span>
                            <span>
                              <input type="text" id="ifname" name="CustomerFirstname" class="form-control-3" placeholder="First name">
                            </span>
                            <span>
                              <input type="text" id="ilname" name="Customerlastname" class="form-control-3" placeholder="Last name">
                            </span>
                          </div>
                        </div>

                        <div class="form-group form-group-2 flex-s-b">
                          <label>Company Name <?php echo $req; ?></label>
                          <input type="text" name="CompanyName" id="icname" class="form-control-3">
                        </div>

                        <div class="form-group form-group-2 flex-s-b">
                          <label>Customer Display name <?php echo $req; ?></label>
                          <select name="CustomerDisplayName" onmouseover="DisplayName()" class="form-control-3" required="">
                            <option value="null">Select Display Name</option>
                            <option value="" id="fname"></option>
                            <option value="" id="lname"></option>
                            <option value="" id="cname"></option>
                            <option value="" id="fullname"></option>
                            <option value="" id="c2name"></option>
                            <option value="" id="c3name"></option>
                          </select>
                        </div>

                        <div class="form-group form-group-2 flex-s-b">
                          <label>Customer Phone <?php echo $req; ?></label>
                          <div class="raw-inputs">
                            <span>
                              <select class="p-inputs form-control-3" name="CountryPhoneCode" required="">
                                <?php InputCountryCodes(); ?>
                              </select>
                            </span>
                            <span>
                              <input type="text" name="CustomerWorkPhone" class="form-control-3" placeholder="Work">
                            </span>
                            <span>
                              <input type="text" name="CustomerMobilePhone" class="form-control-3" placeholder="Mobile">
                            </span>
                          </div>
                        </div>

                        <div class="form-group form-group-2 flex-s-b">
                          <label>Customer Email-ID <?php echo $req; ?></label>
                          <input type="text" name="CustomerEmailId" class="form-control-3">
                        </div>

                        <div class="form-group form-group-2 flex-s-b">
                          <label>Website </label>
                          <input type="text" name="CustomerWebsite" class="form-control-3">
                        </div>

                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-1" style="height:100% !important;">
                      <div class="input-block">
                        <h4>More Details</h4>
                        <ul class="nav nav-pills m-b-3" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <span onclick="ViewTab('moredetails')" class="nav-link btn btn-sm btn-primary">More Details</span>
                          </li>
                          <li class="nav-item" role="presentation">
                            <span onclick="ViewTab('address')" class="nav-link btn btn-sm btn-primary">Address</span>
                          </li>
                          <li class="nav-item" role="presentation">
                            <span onclick="ViewTab('contactperson')" class="nav-link btn btn-sm btn-primary">Contact Persons</span>
                          </li>
                          <li class="nav-item" role="presentation">
                            <span onclick="ViewTab('remarks')" class="nav-link btn btn-sm btn-primary">Remarks</span>
                          </li>
                        </ul>

                        <div id="moredetails">
                          <div class="row">
                            <div class="col-md-12">
                              <h4>Add Details</h4>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label id="taxationname">GST No</label>
                              <input type="text" name="CustomerTaxationNumber" value="" class="form-control-3" required="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>Currency Preferance</label>
                              <select name="CustomerCurrenciePreference" class="form-control-3" required="">
                                <?php echo CurrencyOptions(); ?>
                              </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>Balance</label>
                              <input name="CustomerBalance" class="form-control-3" type="text" required="" placeholder="Rs.">
                            </div>
                          </div>
                        </div>

                        <div style="display:none;" id="address">
                          <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                              <h4>Billing Address</h4>
                              <label>Street Address</label>
                              <textarea name="CustomerStreetAddress" class="form-control-3" style="height:100% !important;line-height:100% !important;" rows="4" required=""></textarea>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>City</label>
                              <input name="CustomerCity" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>State</label>
                              <input name="CustomerState" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>Country</label>
                              <input name="CustomerCountry" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>Zip Code/Pincode</label>
                              <input name="CustomerPincode" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                              <h4>Shipping Address</h4>
                              <label>Street Address</label>
                              <textarea name="CustomerStreetAddress1" class="form-control-3" style="height:100% !important;line-height:100% !important;" rows="4" required=""></textarea>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>City</label>
                              <input name="CustomerCity1" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>State</label>
                              <input name="CustomerState1" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>Country</label>
                              <input name="CustomerCountry1" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">
                              <label>Zip Code/Pincode</label>
                              <input name="CustomerPincode1" class="form-control-3" type="text" required="" placeholder="">
                            </div>
                          </div>
                        </div>

                        <div id="contactperson" style="display:none;">
                          <div class="row">
                            <div class="col-md-12">
                              <h4>Contact Person</h4>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Name</label>
                              <input name="CustomerContactPersonName1" type="text" value="" class="form-control-3">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Phone</label>
                              <input name="CustomerContactPersonPhone1" type="text" value="" class="form-control-3">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Name</label>
                              <input name="CustomerContactPersonName2" type="text" value="" class="form-control-3">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Phone</label>
                              <input name="CustomerContactPersonPhone2" type="text" value="" class="form-control-3">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Name</label>
                              <input name="CustomerContactPersonName3" type="text" value="" class="form-control-3">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Phone</label>
                              <input name="CustomerContactPersonPhone3" type="text" value="" class="form-control-3">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Name</label>
                              <input name="CustomerContactPersonName4" type="text" value="" class="form-control-3">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Phone</label>
                              <input name="CustomerContactPersonPhone4" type="text" value="" class="form-control-3">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Name</label>
                              <input name="CustomerContactPersonName5" type="text" value="" class="form-control-3">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                              <label>Person Phone</label>
                              <input name="CustomerContactPersonPhone5" type="text" value="" class="form-control-3">
                            </div>
                          </div>
                        </div>

                        <div id="remarks" style="display:none;">
                          <div class="row">
                            <div class="col-md-12">
                              <h4>Remarks</h4>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                              <label>Remarks</label>
                              <textarea name="CustomerRemarks" class="form-control-3" rows="5" style="height:auto !important;line-height:auto !important;"></textarea>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button name="SaveCustomer" class="btn btn-md app-bg" Type="submit">Save</button>
                      <button class="btn btn-md btn-secondary" Type="reset">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!--End page content-->
        </div>
        <script>
          function ViewTab(data) {
            var viewdata = data;
            if (viewdata === "moredetails") {
              document.getElementById("moredetails").style.display = "block";
              document.getElementById("address").style.display = "none";
              document.getElementById("contactperson").style.display = "none";
              document.getElementById("remarks").style.display = "none";
            } else if (viewdata === "address") {
              document.getElementById("moredetails").style.display = "none";
              document.getElementById("address").style.display = "block";
              document.getElementById("contactperson").style.display = "none";
              document.getElementById("remarks").style.display = "none";
            } else if (viewdata === "contactperson") {
              document.getElementById("moredetails").style.display = "none";
              document.getElementById("address").style.display = "none";
              document.getElementById("contactperson").style.display = "block";
              document.getElementById("remarks").style.display = "none";
            } else if (viewdata === "remarks") {
              document.getElementById("moredetails").style.display = "none";
              document.getElementById("address").style.display = "none";
              document.getElementById("contactperson").style.display = "none";
              document.getElementById("remarks").style.display = "Block";
            }
          }
        </script>
        <script>
          function tax() {
            if (document.getElementById("taxationvalue1").checked) {
              document.getElementById("taxationname").innerHTML = "GST No";
            } else {
              document.getElementById("taxationname").innerHTML = "PAN No";
            }
          }
        </script>

        <script>
          function DisplayName() {
            var salute = document.getElementById("salute");
            var ifname = document.getElementById("ifname");
            var ilname = document.getElementById("ilname");
            var icname = document.getElementById("icname");
            var fname = document.getElementById("fname");
            var lname = document.getElementById("lname");
            var cname = document.getElementById("cname");
            var fullname = document.getElementById("fullname");
            var c2name = document.getElementById("c2name");
            var c3name = document.getElementById("c3name");

            fname.value = salute.value + " " + ifname.value + " " + ilname.value;
            fname.innerHTML = salute.value + " " + ifname.value + " " + ilname.value;

            lname.value = salute.value + " " + ilname.value + " " + ifname.value;
            lname.innerHTML = salute.value + " " + ilname.value + " " + ifname.value;

            cname.value = ifname.value + " " + ilname.value + " (" + icname.value + ")";
            cname.innerHTML = ifname.value + " " + ilname.value + " (" + icname.value + ")";

            fullname.value = salute.value + " " + ilname.value + " " + ifname.value + " (" + icname.value + ")";
            fullname.innerHTML = salute.value + " " + ilname.value + " " + ifname.value + " (" + icname.value + ")";

            c2name.value = icname.value + " " + "(" + ifname.value + " " + ilname.value + " )";
            c2name.innerHTML = icname.value + " " + "(" + ifname.value + " " + ilname.value + " )";

            c3name.value = icname.value + " " + "(" + salute.value + " " + ifname.value + " " + ilname.value + " )";
            c3name.innerHTML = icname.value + " " + "(" + salute.value + " " + ifname.value + " " + ilname.value + " )";
          }
        </script>
        <?php include '../../include/admin/sidebar.php'; ?>
      </div>
      <?php include '../../include/admin/footer.php'; ?>
    </div>


    <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>