    <!-- datatables -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/media/js/jquery-1.12.4.js">
    </script>
    
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#tabel-harga').DataTable();
    } );
    </script>
<script>
  
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
 </script>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(<?php echo base_url();?>assets/uploads/Sinpasa-823x420.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="display-t">
					<div class="display-tc animate-box" data-animate-effect="fadeIn">
						<h1>Tabel Komoditas</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div id="fh5co-contact">
      
  <div class="container">
    <div class="row">
      <div class="col-md-4">
					<?php if ($this->uri->segment(2) === FALSE) {
                    echo "<p>Harga Rata - Rata Semua Pasar  Tanggal <br>".TanggalIndo($data_rataratahariini[0]->tgl_update)."</p>";
                }elseif ($this->uri->segment(2) == 'cari') {
                    echo "<p>Harga Komoditas di ".$nama_pasar->nama_pasar."<br>  Tanggal ".TanggalIndo($tgl_awal)."</p>";
                } ?>
          <button onclick="printContent('tab-surat-masuk')" class="btn btn-primary"><i class="fa fa-print" ></i> &nbsp;Cetak Laporan</button>
			</div> 
      <div class="col-md-8 text-center" >
          <?php $attr = array('class' => 'form-inline'); echo form_open('tabel_komoditas/cari',$attr); ?>
            <div class="form-group">
              <div class="input-group">
                <div class="select-group-addon">Pilih Tanggal</div>
                <input type="date" class="form-control" id="tanggal"  name="tgl_awal" required>
              </div>
            </div>
            <div class="form-group">
              <div class="select-group-addon">Pilih Pasar</div>
              <select class="form-control" name="id_pasar" required>
              <?php if (isset($data_pasar)) { foreach ($data_pasar as $key) { ?>
                <option value="<?php echo $key->id_pasar; ?>"><?php echo $key->nama_pasar; ?></option>
              <?php }} ?>
              </select>
            </div>
            <div class="form-group">
              <div class="select-group-addon">&nbsp;</div>
              <button type="submit" class="btn btn-success">Tampilkan</button>
            </div>
          <br/>
          <?php echo form_close(); ?>
      </div>
      <div class="col-md-12" id="tab-surat-masuk">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
          <span>DINAS PERINDUSTRIAN DAN PERDAGANGAN</span>
          <h2>Info Komoditas</h2>
          <?php if ($this->uri->segment(2) === FALSE) {
                    echo "<p>Harga Rata - Rata Semua Pasar  Tanggal <br>".TanggalIndo($data_rataratahariini[0]->tgl_update)."</p>";
                }elseif ($this->uri->segment(2) == 'cari') {
                    echo "<p>Harga Komoditas di ".$nama_pasar->nama_pasar."<br>  Tanggal ".TanggalIndo($tgl_awal)."</p>";
                } ?>
          
        </div>
          <table class="table table-bordered" id="tabel-harga" style="font-family: segoe UI;">
                  <thead>
                    <tr class="info">
                      <th class="text-center">No</th>
                      <th class="text-center">Bahan Pokok</th>
                      <th class="text-center">Jenis Bahan Pokok</th>
                      <th class="text-center">Satuan</th>
                      <th class="text-center">Harga Kemarin</th>
                      <th class="text-center">Harga Sekarang</th>
                      <th class="text-center">Perubahan (Rp)</th>
                      <th class="text-center">Perubahan (%)</th>
                    </tr>
                  </thead>
                  <tbody>

                <?php
                $no = 1;
                $bahanAwal = "";
                $hasil = "";
                foreach($data_rataratahariini as $key => $val)
            {
              
              $bahanAkhir = $val->nama_bahan_pokok;
                  if( empty( $data_ratarataharikemarin ) )
                      {
                           $val2    = array('harga_ratarata' => '0');
                           $selisih = 0;
                           $persen  = 0;
                           $style   = "warna-stabil";
                      }
                      else
                      {
                    @$val2 = $data_ratarataharikemarin[$key];
                    if ($val->harga_ratarata > $val2->harga_ratarata)
                    {
                        $selisih = $val->harga_ratarata - $val2->harga_ratarata;
                        $persen  =  $selisih / $val->harga_ratarata * 100;
                        $status  = "Harga Naik";
                        $style   = "danger";
                        $icon = "<i style='color:red;' class='icon-arrow-up'></i> ";
                        
                    }
                    elseif ($val->harga_ratarata < $val2->harga_ratarata) {
                        
                        $selisih = $val2->harga_ratarata - $val->harga_ratarata;
                        $persen  =  $selisih / $val2->harga_ratarata * 100;
                        $status = "Harga Turun ";
                        $style   = "success";
                        $icon = "<i style='color:green;' class='icon-arrow-down'></i> ";
                        

                    }
                    elseif ($val->harga_ratarata = $val2->harga_ratarata) {
                        $selisih = 0;
                        $persen  = 0;
                        $status = "Harga Stabil";
                        $style   = "primary";
                        $icon = "= ";
                        
                    }
                }

                ?>

                    <tr>
                      <th class="text-center"><?php echo $no++; ?></th>
                      <td><?php echo $val->nama_bahan_pokok; ?></td>
                      <td><?php echo $val->nama_jenis_bahan_pokok; ?></td>
                      <td><?php echo $val->satuan; ?></td>
                      <td class="text-right"><?php echo buatrp(@$val2->harga_ratarata); ?></td>
                      <td class="text-right"><?php echo buatrp($val->harga_ratarata); ?></td>
                      <td class="text-right <?php echo $style; ?>" ><?php echo buatrp($selisih); ?></td>
                      <td class="text-right"><?php echo round($persen); ?> %</td>
                     
                    </tr>

                   <?php } ?>
                  </tbody>
                </table>
      </div>
              
      </div>
  </div>
      <!-- /Intro Block
      ============================================ -->
      
</div>