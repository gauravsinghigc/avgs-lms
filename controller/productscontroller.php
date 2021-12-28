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


//start actiivity here
if (isset($_POST['CreateProductCategories'])) {
 $ProCategoryName = $_POST['ProCategoryName'];
 $ProCategoryImage = UPLOAD_FILES("../storage/products/category", "ProCategoryImage", "Category_", "$ProCategoryName", "ProCategoryImage");
 $ProCategoryStatus = 1;
 $ProCategoryCreatedAt = date("d M, Y");

 $Save = SAVE("pro_categories", ["ProCategoryName", "ProCategoryImage", "ProCategoryStatus", "ProCategoryCreatedAt"]);
 RESPONSE($Save, "New Category: <b>$ProCategoryName</b> is created successfully!", "Unable to create new category");

 //product sub category
} elseif (isset($_POST['CreateProductSubCategories'])) {
 $ProSubCategoryName = $_POST['ProSubCategoryName'];
 $ProSubCategoryId = $_POST['ProSubCategoryId'];
 $ProSubCategoryImage = UPLOAD_FILES("../storage/products/subcategory", "ProSubCategoryImage", "subcategory", "$ProSubCategoryName", "ProSubCategoryImage");
 $ProSubCategoryStatus = 1;
 $ProSubCategoryCreatedAt = date("d M, Y");

 $save = SAVE("pro_sub_categories", ["ProSubCategoryName", "ProSubCategoryId", "ProSubCategoryImage", "ProSubCategoryStatus", "ProSubCategoryCreatedAt"]);
 RESPONSE($save, "New Sub category <b>$ProSubCategoryName</b> is created successfully!", "Unable to create new sub category!");

 //product brands
} elseif (isset($_POST['CreateProductbrands'])) {
 $ProBrandName = $_POST['ProBrandName'];
 $ProBrandImage = UPLOAD_FILES("../storage/products/brands", "ProBrandImage", "brands", "$ProBrandName", "ProBrandImage");
 $ProBrandStatus = 1;
 $ProBrandCreatedAt = date("d M, Y");

 $save = SAVE("pro_brands", ["ProBrandName", "ProBrandStatus", "ProBrandCreatedAt", "ProBrandImage"]);
 RESPONSE($save, "New $ProBrandName is created successfully!", "unable to create new brand name");

 //save products
} else if (isset($_POST['CreateProducts'])) {
 $ProductName = $_POST['ProductName'];
 $ProductRefernceCode = $_POST['ProductRefernceCode'];
 $ProductImage = UPLOAD_FILES("../storage/products/pro-img", "ProductImage", "$ProductName", "$ProductRefernceCode", "ProductImage");
 $ProductCategoryId = $_POST['ProductCategoryId'];
 $ProductSubCategoryId = $_POST['ProductSubCategoryId'];
 $ProductBrandId = $_POST['ProductBrandId'];
 $ProductSellPrice = $_POST['ProductSellPrice'];
 $ProductMrpPrice = $_POST['ProductMrpPrice'];
 $ProductDescriptions = SECURE($_POST['ProductDescriptions'], "e");
 $ProductWeight = $_POST['ProductWeight'];
 $ProductStatus = 1;
 $ProductCreatedAt = date("d M, Y");
 $ProductCreatedBy = LOGIN_UserId;

 $SaveProducts = SAVE("products", ["ProductName", "ProductRefernceCode", "ProductImage", "ProductCategoryId", "ProductSubCategoryId", "ProductBrandId", "ProductSellPrice", "ProductMrpPrice", "ProductDescriptions", "ProductWeight", "ProductStatus", "ProductCreatedAt", "ProductCreatedBy"]);
 RESPONSE($SaveProducts, "New product <b>$ProductName</b> is Saved successfully!", "Unable to save new product");

 //delete product categories
} elseif (isset($_GET['delete_categories'])) {
 $access_url = SECURE($_GET['access_url'], "d");
 if ($_GET['delete_categories'] == "true") {
  if ($_GET['validation'] == SECURE(IP_ADDRESS, "e")) {
   $ProCategoriesId = SECURE($_GET['request'], "d");
   $columnname = SECURE($_GET['data'], "d");
   $Delete = DELETE("DELETE FROM $columnname where ProCategoriesId='$ProCategoriesId'");
   RESPONSE($Delete, "Product Category Deleted!", "Unable to delete product categories");
  } else {
   LOCATION("danger", "Unable to delete product categories via this device", $access_url);
  }
 } else {
  LOCATION("warning", "Unable to delete product categories!", "$access_url");
 }

 //delete sub category
} elseif (isset($_GET['delete_sub_categories'])) {
 if ($_GET['delete_sub_categories'] == "true") {
  if ($_GET['validation'] == SECURE(IP_ADDRESS, "e")) {
   $columnname = SECURE($_GET['data'], "d");
   $ProSubCategoriesId = SECURE($_GET['request'], "d");
   $Delete = DELETE("DELETE FROM $columnname where ProSubCategoriesId='$ProSubCategoriesId'");
   RESPONSE($Delete, "Product Sub Category Deleted!", "Unable to delete product sub categories");
  } else {
   LOCATION("danger", "Unable to delete product sub categories via this device", $access_url);
  }
 } else {
  LOCATION("warning", "Unable to delete product sub categories!", "$access_url");
 }

 //delete product brands
} elseif (isset($_GET['delete_brands'])) {
 $access_url = SECURE($_GET['access_url'], "d");
 if ($_GET['delete_brands'] == "true") {
  if ($_GET['validation'] == SECURE(IP_ADDRESS, "e")) {
   $columnname = SECURE($_GET['data'], "d");
   $ProBrandId = SECURE($_GET['request'], "d");
   $Delete = DELETE("DELETE FROM $columnname where ProBrandId='$ProBrandId'");
   RESPONSE($Delete, "Product brand Deleted!", "Unable to delete product brand");
  } else {
   LOCATION("danger", "Unable to delete product brand via this device", $access_url);
  }
 } else {
  LOCATION("warning", "Unable to delete product brands!", $access_url);
 }
}
