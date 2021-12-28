<nav id="mainnav-container">
 <div class="navbar-header">
  <a href="<?php echo DOMAIN; ?>/admin" class="navbar-brand app-bg">
   <img src="<?php echo $MAIN_LOGO; ?>" class="brand-icon">
   <div class="brand-title">
    <span class="brand-text"><?php echo APP_NAME; ?></span>
   </div>
  </a>
 </div>

 <div id="mainnav">
  <div id="mainnav-menu-wrap">
   <div class="nano">
    <div class="nano-content">
     <ul id="mainnav-menu" class="list-group">
      <li class="list-header">Home</li>
      <li> <a href="<?php echo DOMAIN; ?>/admin/dashboard/"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span> </a> </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/leads/">
        <i class="fa fa-phone"></i>
        <span class="menu-title">
         Leads
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/leads/follow-ups">
        <i class="fa fa-arrow-up"></i>
        <span class="menu-title">
         Today Follows
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/deals/">
        <i class="fa fa-star"></i>
        <span class="menu-title">
         Deals
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/orders/">
        <i class="fa fa-shopping-cart"></i>
        <span class="menu-title">
         Orders
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/payments/">
        <i class="fa fa-exchange"></i>
        <span class="menu-title">
         Transactions
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/invoices">
        <i class="fa fa-file-pdf-o"></i>
        <span class="menu-title">
         Invoices
        </span>
       </a>
      </li>

      <li>
       <a href="<?php echo DOMAIN; ?>/admin/customers/">
        <i class="fa fa-users"></i>
        <span class="menu-title">
         Customers
        </span>
       </a>
      </li>

      <li>
       <a href="<?php echo DOMAIN; ?>/admin/products/">
        <i class="fa fa-table"></i>
        <span class="menu-title">
         Products
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/products/categories/">
        <i class="fa fa-list"></i>
        <span class="menu-title">
         Categories
        </span>
       </a>
      </li>

      <li>
       <a href="<?php echo DOMAIN; ?>/admin/quotations">
        <i class="fa fa-file-pdf-o"></i>
        <span class="menu-title">
         Quotations
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/quotations/files/">
        <i class="fa fa-file"></i>
        <span class="menu-title">
         Attachements & Files
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/users/">
        <i class="fa fa-users"></i>
        <span class="menu-title">
         Users
        </span>
       </a>
      </li>

      <a href="<?php echo DOMAIN; ?>/admin/configurations/users">
       <i class="fa fa-users"></i>
       <span class="menu-title">
        Users Settings
       </span>
      </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/configurations">
        <i class="fa fa-gears"></i>
        <span class="menu-title">
         Configurations
        </span>
        <i class="arrow"></i>
       </a>
       <ul class="collapse">
        <li><a href="<?php echo DOMAIN; ?>/admin/configurations/">Company Profile</a></li>
        <li><a href="<?php echo DOMAIN; ?>/admin/configurations/api-keys.php">API & Keys</a></li>
        <li><a href="<?php echo DOMAIN; ?>/admin/configurations/advance-settings.php">Advance Settings</a></li>
        <li><a href="<?php echo DOMAIN; ?>/admin/configurations/branches/">Branches</a></li>
        <li><a href="<?php echo DOMAIN; ?>/admin/configurations/currencies/">Currencies</a></li>
       </ul>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/reports/">
        <i class="fa fa-print"></i>
        <span class="menu-title">
         Reports
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/activities/">
        <i class="fa fa-list-ol"></i>
        <span class="menu-title">
         Activity Logs
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/activities/logins.php">
        <i class="fa fa-list"></i>
        <span class="menu-title">
         Login Logs
        </span>
       </a>
      </li>

      <li>
       <a href="<?php echo DOMAIN; ?>/admin/profile">
        <i class="fa fa-user"></i>
        <span class="menu-title">
         Profile
        </span>
       </a>
      </li>
      <li>
       <a href="<?php echo DOMAIN; ?>/admin/logout.php">
        <i class="fa fa-sign-out"></i>
        <span class="menu-title">
         Logout
        </span>
       </a>
      </li>
      <br><br><br><br><br><br>
     </ul>

    </div>
   </div>
  </div>
  <!--================================-->
  <!--End menu-->
 </div>
</nav>