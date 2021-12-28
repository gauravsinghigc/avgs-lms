<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Quotations";
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
                  <a href="<?php echo DOMAIN; ?>/admin/quotations/index.php" class="btn btn-sm btn-primary square">All Quotations</a>
                  <a href="<?php echo DOMAIN; ?>/admin/quotations/files/index.php" class="btn btn-sm btn-info square">All Attachements</a>
                </div>
                <div class="">
                  <a href="add-quotations.php" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Quotation</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <h4 class="m-b-0"><?php echo $PageName; ?></h4>
              <div class="row m-t-10">
                <?php
                $SQLproducts = SELECT("SELECT * FROM products, pro_categories, pro_sub_categories, pro_brands where products.ProductCategoryId=pro_categories.ProCategoriesId and products.ProductSubCategoryId=pro_sub_categories.ProSubCategoriesId and products.ProductBrandId=ProBrandId ORDER BY products.ProductId ASC");
                while ($fetchpro_brands = mysqli_fetch_array($SQLproducts)) {
                  $ProductName = $fetchpro_brands['ProductName'];
                  $ProBrandName = $fetchpro_brands['ProBrandName'];
                  $ProCategoryName = $fetchpro_brands['ProCategoryName'];
                  $ProSubCategoryName = $fetchpro_brands['ProSubCategoryName'];
                  $ProductRefernceCode = $fetchpro_brands['ProductRefernceCode'];
                  $ProductImage = $fetchpro_brands['ProductImage'];
                  $ProductCategoryId = $fetchpro_brands['ProductCategoryId'];
                  $ProductSubCategoryId = $fetchpro_brands['ProductSubCategoryId'];
                  $ProductBrandId = $fetchpro_brands['ProductBrandId'];
                  $ProductSellPrice = $fetchpro_brands['ProductSellPrice'];
                  $ProductMrpPrice = $fetchpro_brands['ProductMrpPrice'];
                  $ProductDescriptions = SECURE($fetchpro_brands['ProductDescriptions'], "e");
                  $ProductWeight = $fetchpro_brands['ProductWeight'];
                  $ProductStatus = StatusView($fetchpro_brands['ProductStatus']);
                  $ProductCreatedAt = $fetchpro_brands['ProductCreatedAt'];
                  $ProductUpdatedAt = ReturnValue($fetchpro_brands['ProductUpdatedAt']);
                  $ProductCreatedBy = $fetchpro_brands['ProductCreatedBy']; ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="shadow-lg br10">
                      <div class="flex-s-b">
                        <div class="img-section">
                          <img src="<?php echo STORAGE_URL; ?>/products/pro-img/<?php echo $ProductImage; ?>" alt="<?php echo $ProductName; ?>" title="<?php echo $ProductName; ?>" class="w-100">
                        </div>
                        <div class="item-details p-1">
                          <p class="lh-1-2 m-b-2">
                            <span class="fs-14 bold"><?php echo $ProductName; ?></span><br>
                            <span class="fs-12 text-grey">
                              <span>
                                <span><?php echo $ProCategoryName; ?></span> |
                                <span><?php echo $ProSubCategoryName; ?></span>
                              </span><br>
                              <span><b>Brand: </b><?php echo $ProBrandName; ?></span><br>
                              <span class="flex-s-b">
                                <span><?php echo $ProductStatus; ?></span>
                                <span class="text-primary"><?php echo $ProductRefernceCode; ?></span>
                              </span>
                              <span><i class='fa fa-calendar text-primary'></i> <?php echo $ProductCreatedAt; ?></span><br>
                              <span><i class="fa fa-edit text-warning"></i> <?php echo $ProductUpdatedAt; ?></span><br>
                            </span>
                            <span class="flex-s-b m-t-1">
                              <span class="m-unit"><?php echo $ProductWeight; ?></span>
                              <span class="prices">
                                <span class="mrp"><strike>Rs.<?php echo $ProductMrpPrice; ?></strike></span>
                                <span class="sell">Rs.<?php echo $ProductSellPrice; ?></span>
                              </span>
                            </span>
                          </p>
                          <a href="#" class="btn-sm text-primary"><i class="fa fa-edit"></i> Edit</a>
                          <a href="#" class="btn-sm text-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include '../../include/admin/sidebar.php'; ?>
      </div>
      <?php include '../../include/admin/footer.php'; ?>
    </div>


    <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>