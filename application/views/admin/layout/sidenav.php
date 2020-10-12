  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
          </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  Brad Diesel
                                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">Call me whenever you can...</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  John Pierce
                                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">I got your message bro</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  Nora Silvester
                                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">The subject goes here</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-envelope mr-2"></i> 4 new messages
                      <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-users mr-2"></i> 8 friend requests
                      <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-file mr-2"></i> 3 new reports
                      <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" title="Logout" href="<?php echo base_url('logout')?>" role="button"><i class="fas fa-sign-out-alt"></i></a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?php echo base_url('adminAssets/img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">CA Web</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?php echo base_url('adminAssets/img/user.png') ?>" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <?php
                    if ($_SESSION['userInfo']['role'] == ADMIN) {
                    ?>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-edit"></i>
                              <p>
                                  Forms
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <!-- <li class="nav-item">
                              <a href="<?php echo base_url('Admin/') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Countries</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/forms/advanced.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Categories</p>
                              </a>
                          </li> -->
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/addServices') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Services</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/addPackages') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Service Packages</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/addSection') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Add Section</p>
                                  </a>
                              </li>
                              <!-- <li class="nav-item">
                              <a href="pages/forms/validation.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Validation</p>
                              </a>
                          </li> -->
                          </ul>
                      </li>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-table"></i>
                              <p>
                                  Tables
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/countries') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Countries</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/Categories') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Categories</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/showServices') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Services</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  <?php } else if ($_SESSION['userInfo']['role'] == USER) {
                    ?>

                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="fas fa-tasks"></i>
                               <p>
                                   Services
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <!-- <li class="nav-item">
                              <a href="<?php echo base_url('Admin/') ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Countries</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/forms/advanced.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Categories</p>
                              </a>
                          </li> -->
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/addServices') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Services</p>
                                  </a>
                              </li>
                              <!-- <li class="nav-item">
                              <a href="pages/forms/validation.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Validation</p>
                              </a>
                          </li> -->
                          </ul>
                      </li>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-money-check"></i>
                              <p>
                                  Payments/Receipts
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?php echo base_url('User/payment_receipts')?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Payments/Receipts</p>
                                  </a>
                              </li>
                          </ul>
                      </li>

                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-headphones"></i>
                              <p>
                                  Helpdesk
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?php echo base_url('Admin/countries') ?>" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Generate case</p>
                                  </a>
                              </li>
                          </ul>
                         
                      </li>

                  <?php } ?>






              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>