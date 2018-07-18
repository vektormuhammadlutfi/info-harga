<nav class="fh5co-nav" role="navigation">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-xs-2">
          <div id="fh5co-logo"><a href="http://localhost/info-harga/"><img src="<?php echo base_url();?>assets/uploads/Logo-Gowa.jpg" alt="" width="40px"></a></div>
        </div>
        
        <div class="col-md-6 col-xs-6 text-center menu-1">
          <ul>
            <li class="has-dropdown">
              <a href="<?php echo base_url(); ?>Home">Home</a>
            </li>
            <li class="has-dropdown">
              <a href="#">Data Pasar</a>
              <ul class="dropdown">
              <?php 
              $data_pasar = $this->Komoditas_model->get_pasar();
              foreach ($data_pasar as $row)
              {
              ?>
                    <li><a href='<?php echo base_url('pasar/data/'.$row->id_pasar); ?>'><?php echo $row->nama_pasar; ?></a></li>
              <?php
              }
              ?>
              </ul>
            </li>
            <li class="has-dropdown">
              <a href="<?php echo base_url(); ?>tabel_komoditas">Tabel Komoditas</a>
            </li>
            <li class="has-dropdown">
              <a href="<?php echo base_url(); ?>prediksi">Prediksi</a>
            </li>
            <li><a href="<?php echo base_url(); ?>kontak">Kontak</a></li>
          </ul>
        </div>
        
      </div>
      
    </div>
  </nav>