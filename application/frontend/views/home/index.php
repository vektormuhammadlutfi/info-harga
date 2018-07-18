    <div class="container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
          <span>DINAS PERINDUSTRIAN DAN PERDAGANGAN</span>
          <h2>Info Komoditas.</h2>
          <p>Harga bahan pokok tanggal <b><?php echo TanggalIndo($data_rataratahariini[0]->tgl_update); ?></b>, perbandingan dengan harga tanggal <b><?php echo TanggalIndo($data_ratarataharikemarin[0]->tgl_update); ?></b></p>
        </div>
      </div>

     

      <div class="row">
       <?php
       
        foreach($data_rataratahariini as $key => $val)
        {
            $val2 = $data_ratarataharikemarin[$key];
            if ($val->harga_ratarata > $val2->harga_ratarata)
            {
                $selisih = $val->harga_ratarata - $val2->harga_ratarata;
                $status  = "Harga Naik";
                $style   = "danger";
                $icon = "<i style='color:red;' class='icon-arrow-up'></i> ";
                
            }
            elseif ($val->harga_ratarata < $val2->harga_ratarata) {
                
                $selisih = $val2->harga_ratarata - $val->harga_ratarata;
                $status = "Harga Turun ";
                $style   = "success";
                $icon = "<i style='color:green;' class='icon-arrow-down'></i> ";
                

            }
            elseif ($val->harga_ratarata = $val2->harga_ratarata) {
                $selisih = 0;
                $status = "Harga Stabil";
                $style   = "primary";
                $icon = "= ";
                
            }

        
        $hasil = (0.9 * $val->harga_ratarata) + (1 - 0.9) * $val2->harga_ratarata;
        ?>

        <div class="col-md-3 col-sm-4 col-xs-12 text-center animate-box">
          <div class="product">
            <div class="product-grid" style="background-image:url(<?php echo base_url('assets/uploads/'.$val->foto_jenis_bahan_pokok) ?>);height: 150px;">

              <div class="inner"  style="height: 150px;">
                <p>
                  <a href="<?php echo base_url('bahanpokok/detail/'.$val->id_jenisbahanpokok); ?>" class="btn btn-<?php echo $style; ?>"><?php echo $icon."".$status." " ?><b><?php echo buatrp($selisih) ?>
                  </a>
                </p>
              </div>

            </div>
            <div class="desc">
              <h3><a href="<?php echo base_url('bahanpokok/detail/'.$val->id_jenisbahanpokok); ?>"><?php echo $icon."".$val->nama_jenis_bahan_pokok; ?></a></h3>

              <span style="font-size: 20px;font-weight: bold;color: black;" class="price"><?php echo buatrp($val->harga_ratarata)."/".$val->satuan; ?></span>

            </div>
          </div>
        </div>

        <?php
        }
        ?>
      </div>
    </div>