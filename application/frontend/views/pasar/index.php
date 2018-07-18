<?php
$bln      =date("m");
$id_pasar = $this->uri->segment(3);

?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(<?php echo base_url("assets/uploads/".$data_rataratahariini[0]->foto_pasar); ?>);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="display-t">
					<div class="display-tc animate-box" data-animate-effect="fadeIn">
						<h1><?php echo $data_rataratahariini[0]->nama_pasar; ?></h1>
						<h2><?php echo $data_rataratahariini[0]->alamat_pasar; ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div id="fh5co-product">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="fh5co-tabs animate-box">
					<ul class="fh5co-tab-nav">
						<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Biografi Pasar</span></a></li>
					</ul>

					<!-- Tabs -->
					<div class="fh5co-tab-content-wrap">

						<div class="fh5co-tab-content tab-content active" data-tab-content="1">
							<div class="col-md-10 col-md-offset-1">
								<h2><?php echo $data_rataratahariini[0]->nama_pasar; ?></h2>
								<p><?php echo $data_rataratahariini[0]->biografi_pasar; ?></p>

								<div class="row">
									<div class="col-md-6">
										<h2 class="uppercase">Alamat</h2>
										<p><?php echo $data_rataratahariini[0]->alamat_pasar; ?></p>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

    <div class="container" id="product">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
          <p>Harga bahan pokok tanggal <b><?php echo TanggalIndo(@$data_rataratahariini[0]->tgl_update); ?></b>, perbandingan dengan harga tanggal <b><?php echo TanggalIndo(@$data_ratarataharikemarin[0]->tgl_update); ?></b></p>
        </div>
      </div>

     

      <div class="row" >
       <?php
        foreach($data_rataratahariini as $key => $val)
        {
            @$val2 = $data_ratarataharikemarin[$key];
            if (@$val->harga_ratarata > @$val2->harga_ratarata)
            {
                @$selisih = $val->harga_ratarata - $val2->harga_ratarata;
                $status  = "Harga Naik";
                $style   = "danger";
                $icon = "<i style='color:red;' class='icon-arrow-up'></i> ";
                
            }
            elseif (@$val->harga_ratarata < @$val2->harga_ratarata) {
                
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
                
            }else{
              echo "data perbandingan belum ada";
            }

        ?>

        <div class="col-md-3 col-sm-4 col-xs-12 text-center animate-box">
          <div class="product" >
            <div class="product-grid" style="background-image:url(<?php echo base_url('assets/uploads/'.$val->foto_jenis_bahan_pokok) ?>);height: 150px;">

              <div class="inner"  style="height: 150px;">
                <p>
                  <a href="#product" class="btn btn-<?php echo $style; ?>"><?php echo $icon."".$status." " ?><b><?php echo buatrp($selisih) ?>
                  </a>
                </p>
              </div>

            </div>
            <div class="desc">
              <h3><a href="#product"><?php echo $icon."".$val->nama_jenis_bahan_pokok; ?></a></h3>

              <span style="font-size: 20px;font-weight: bold;color: black;" class="price"><?php echo buatrp($val->harga_ratarata)."/".$val->satuan; ?></span>
              <br>
              <small class="price">Kemarin <?php echo buatrp(@$val2->harga_ratarata)."/".$val->satuan; ?></small>
            </div>
          </div>
        </div>

        <?php
        }
        ?>
      </div>
    </div>
</div>