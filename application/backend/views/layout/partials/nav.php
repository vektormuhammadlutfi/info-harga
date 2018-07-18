<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-assistive-listening-systems"></i> <span>SPK Komoditas</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>assets/admin/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('full_name') ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                  <a href="<?php echo base_url();?>backend.php/home"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li class=''><a href='<?php echo base_url();?>backend.php/komoditas'><i class='fa fa-area-chart'></i> Data Komoditas</a>
                  </li>
                  </li>
                  <li><a><i class="fa fa-bug"></i> Naive Bayes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php if ($this->session->userdata('role')=='admin') { ?>
                      <li><a href="<?php echo base_url();?>backend.php/naive_bayes">Data training</a></li>
                      <li><a href="<?php echo base_url();?>backend.php/naive_bayes/prediksi">Data training Pasar</a></li>
                      <li><a href="<?php echo base_url();?>backend.php/naive_bayes/metode">Metode</a></li>
                  <?php } ?>
                      <li><a href="<?php echo base_url();?>backend.php/naive_bayes/metode_naive_bayes">Metode Naive Bayes</a></li>
                    </ul>
                  </li>
                  
                  
                </ul>
              </div>
              <?php if ($this->session->userdata('role')=='admin') { ?>
              <div class="menu_section">
                <h3>Master Data</h3>
                <ul class="nav side-menu">
                  <li class=''><a href='<?php echo base_url();?>backend.php/bahanpokok'><i class='fa fa-cart-plus'></i> Data Bahan Pokok</a>
                  </li>
                  <li class=''><a href='<?php echo base_url();?>backend.php/jenis_bahanpokok'><i class='fa fa-flag-o'></i> Data Jenis Bahan Pokok</a>
                  </li>
                  <li class=''><a href='<?php echo base_url();?>backend.php/pasar'><i class='fa fa-simplybuilt'></i> Data Pasar</a>
                  </li>
                  <li class=''><a href='<?php echo base_url();?>backend.php/admin'><i class='fa fa-users'></i> Data User</a>
                  </li>
                </ul>
              </div>
              <?php } ?>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="<?php echo site_url('home/logout'); ?>" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>