<div class="shadow-lg br10 p-2 border-success">
 <div class="br10 app-bg-light p-3 text-center">
  <center>
   <img src="<?php echo $MAIN_LOGO; ?>" class="w-25 mx-auto d-block rounded config-logo">
  </center>
  <form class="form m-t-3" action="../../controller/configcontroller.php" method="POST" enctype="multipart/form-data">
   <input type="text" name="updatelogo" value="true" hidden="">
   <?php echo CurrentFile(APP_LOGO); ?>
   <?php FormPrimaryInputs(true); ?>
   <label for="UploadAppLogo">
    <img src="<?php echo STORAGE_URL_D; ?>/tool-img/img-upload.png" class="w-pr-10 upload-icon">
   </label>
   <input type="file" class="hidden" onchange="form.submit()" hidden="" name="APP_LOGO" id="UploadAppLogo" value="<?php echo APP_LOGO; ?>" accept="images/*">
  </form>
 </div>
 <div class="flex-s-b app-links">
  <a href="<?php echo DOWNLOAD_ANDROID_APP_LINK; ?>" target="_blank" class="m-t-10 w-50">
   <img src="<?php echo STORAGE_URL_D; ?>/tool-img/google.svg">
  </a>
  <a href="<?php echo DOWNLOAD_IOS_APP_LINK; ?>" target="_blank" class="m-t-10 w-50">
   <img src="<?php echo STORAGE_URL_D; ?>/tool-img/apple.png">
  </a>
 </div>
 <p class="m-t-10">
  <span class="fs-20"> <?php echo APP_NAME; ?></span><br>
  <span><i class="fa fa-phone text-info"></i> <?php echo PRIMARY_PHONE; ?></span><br>
  <span><i class="fa fa-envelope text-danger"></i> <?php echo PRIMARY_EMAIL; ?></span><br>
  <span><i class="fa fa-tag text-warning"></i> <?php echo TAGLINE; ?></span><br>
  <span><i class="fa fa-list text-primary"></i> <?php echo SECURE(SHORT_DESCRIPTION, "d"); ?></span><br>
  <span><i class="fa fa-map-marker text-success"></i> <?php echo SECURE(PRIMARY_ADDRESS, "d"); ?></span><br>
 </p>
 <iframe src="<?php echo SECURE(PRIMARY_MAP_LOCATION_LINK, 'd'); ?>" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
 </iframe>
</div>