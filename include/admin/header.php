<header id="navbar">
 <div id="navbar-container" class="boxed">
  <div class="navbar-content clearfix">
   <ul class="nav navbar-top-links pull-left">
    <li class="tgl-menu-btn">
     <a class="mainnav-toggle" href="#" id="sidebarController"> <i class="fa fa-navicon fa-lg"></i> </a>
    </li>
    <li>
     <form action="" method="" class="search-form flex-s-b">
      <select name="search" class='form-control-2 m-b-0' required="">
       <option value="">Customers</option>
       <option value="">Leads</option>
       <option value="">Products</option>
      </select>
      <input type="text" name="value" class="form-control-2 m-b-0" placeholder="Enter Search Value">
     </form>
    </li>

    <!-- include notifications from here via include/admin/notifications.php -->
   </ul>
   <ul class="nav navbar-top-links pull-right">
    <li id="dropdown-user" class="dropdown">
     <a href="<?php echo DOMAIN; ?>/admin/profile/" data-toggle="dropdown" class="dropdown-toggle text-right">
      <span class="pull-right"> <img class="img-circle img-user media-object" src="<?php echo STORAGE_URL_U ?>/img/profile/<?php echo LOGIN_UserProfileImage; ?>" alt="<?php echo LOGIN_UserName; ?>" title="<?php echo LOGIN_UserName; ?>"> </span>
      <div class="username hidden-xs"><?php echo LOGIN_UserName; ?></div>
     </a>
     <div class="dropdown-menu dropdown-menu-right with-arrow">
      <!-- User dropdown menu -->
      <ul class="head-list">
       <li>
        <a href="<?php echo DOMAIN; ?>/admin/profile"> <i class="fa fa-user fa-fw"></i> Profile </a>
       </li>
       <li>
        <a href="#"> <i class="fa fa-envelope fa-fw"></i> Messages </a>
       </li>
       <li>
        <a href="#"> <i class="fa fa-gear fa-fw"></i> Settings </a>
       </li>
       <li>
        <a href="<?php echo DOMAIN; ?>/logout.php"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
       </li>
      </ul>
     </div>
    </li>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End user dropdown-->
   </ul>
  </div>
  <!--================================-->
  <!--End Navbar Dropdown-->
 </div>
</header>