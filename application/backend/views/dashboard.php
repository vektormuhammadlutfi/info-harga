          <div class="row tile_count">
<?php if ($this->session->userdata('role')=='admin') { ?>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Admin</span>
              <?php foreach ($user as $key) {
                ?>
              <div class="count"><?php echo $key->jumlah ?> Orang</div>
              <?php } ?>
            </div>
<?php } ?>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top">Total Bahan Pokok</span>
              <?php foreach ($bahanpokok as $key) {
                ?>
              <div class="count"><i class='fa fa-area-chart'></i> <?php echo $key->jumlah ?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top">Total Jenis Bahan Pokok</span>
              <?php foreach ($jenisbahanpokok as $key) {
                ?>
              <div class="count"><i class='fa fa-flag-o'></i> <?php echo $key->jumlah ?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top">Total Pasar</span>
              <?php foreach ($pasar as $key) {
                ?>
              <div class="count"><i class='fa fa-simplybuilt'></i> <?php echo $key->jumlah ?> </div>
              <?php } ?>
            </div>
            
          </div>
          <!-- /top tiles -->
         
          <br />

          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Cara menggunakan <small>Aplikasi</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                <a>Menambah data komoditas</a>
                            </h2>
                            <div class="byline">
                              <span>Edit</span> by <a>Admin</a>
                            </div>
                            <p class="excerpt">
                            Gunakan menu <span class="byline"><a href='<?php echo base_url();?>backend.php/komoditas'><i class='fa fa-area-chart'></i> Data Komoditas</a></span> untuk menambah data komoditas. <br>
                            Kemudian klik <a href="http://localhost/info-harga/backend.php/komoditas/index/add"><i class='fa fa-plus'></i> Add Data Komoditas</a>

                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                <a>Menggunakan metode</a>
                            </h2>
                            <div class="byline">
                              <span>Edited</span> by <a>Jane Smith</a>
                            </div>
                            Klik menu <a href=''><i class="fa fa-bug"></i> Naive Bayes <span class="fa fa-chevron-down"></span></a> kemudian
                            <p class="excerpt">Gunakan Menu <a href="http://localhost/info-harga/backend.php/naive_bayes/metode_naive_bayes">Metode Naive Bayes</a>
                            </p>
                          </div>
                        </div>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-8 col-sm-8 col-xs-12">



            
              <div class="row">
             <!-- start of weather widget -->
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kondisi Cuaca <small>Kabupaten Gowa</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="temperature"><b>Monday</b>, 07:30 AM
                          <span>F</span>
                          <span><b>C</b>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="weather-icon">
                          <span>
                              <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                          </span>

                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="weather-text">
                          <h2>Sungguminasa
                              <br><i>Ber awan</i>
                          </h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="weather-text pull-right">
                        <h3 class="degrees">23</h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="row weather-days">
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Mon</h2>
                          <h3 class="degrees">25</h3>
                          <span>
                            <canvas id="clear-day" width="32" height="32">
                            </canvas>

                          </span>
                          <h5>15
                              <i>km/h</i>
                          </h5>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Tue</h2>
                          <h3 class="degrees">25</h3>
                          <canvas height="32" width="32" id="rain"></canvas>
                          <h5>12
                              <i>km/h</i>
                          </h5>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Wed</h2>
                          <h3 class="degrees">27</h3>
                          <canvas height="32" width="32" id="snow"></canvas>
                          <h5>14
                              <i>km/h</i>
                          </h5>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Thu</h2>
                          <h3 class="degrees">28</h3>
                          <canvas height="32" width="32" id="sleet"></canvas>
                          <h5>15
                              <i>km/h</i>
                          </h5>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Fri</h2>
                          <h3 class="degrees">28</h3>
                          <canvas height="32" width="32" id="wind"></canvas>
                          <h5>11
                              <i>km/h</i>
                          </h5>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="daily-weather">
                          <h2 class="day">Sat</h2>
                          <h3 class="degrees">26</h3>
                          <canvas height="32" width="32" id="cloudy"></canvas>
                          <h5>10
                              <i>km/h</i>
                          </h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- end of weather widget -->
              </div>
            </div>

          