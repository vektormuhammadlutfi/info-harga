<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(<?php echo base_url();?>assets/uploads/1d1c5-eu-tomato-import-rules-change-to-incorporate-variety.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="display-t">
					<div class="display-tc animate-box" data-animate-effect="fadeIn">
						<h1>Prediksi Naive Bayes</h1>
			            <?php foreach ($data_prediksi->result() as $data) { ?>
			              
			            <code>Kondisi Bahan Pokok :  <?php echo $data->kondisi_bahan_pokok; ?></code><br>
			            <code>Kondisi Cuaca :  <?php echo $data->cuaca; ?></code><br>
			            <code>Persediaan (Stok) :  <?php echo $data->persediaan; ?></code><br>
			            <code>Kondisi Kendaraan Pengangkut :  <?php echo $data->kondisi_kendaraan; ?></code><br>
			            <h1><code><small>Prediksi Harga Bulan ini</small> <?php echo $data->keterangan; ?></code></h1>
			            <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</header><!-- 
<div class="container">
		<div class="row">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="x_panel">
	          <div class="x_content">
	          <br>
	            <p class="text-muted font-13 m-b-30">
	              Ini adalah metode <code>Naive Bayes</code>
	            </p>
				<form role="form" method="POST" action="<?php echo base_url();?>prediksi/metode" onSubmit=\"return validasi(this)\">
		    
					<div class="form-group col-md-3">
						<select class="form-control" name="kelamin">
			                <option value="-" class="opt">Kelamin</option>
			                <option  value="L" >Laki - Laki</option>
			                <option  value="P">Perempuan</option>
			            </select>
					</div>
					<div class="form-group col-md-3">
						<select class="form-control" name="status">
			                <option value="-" class="opt">Status</option>
			                <option  value="MAHASISWA">Mahasiswa</option>
			                <option  value="BEKERJA">Bekerja</option>
			            </select>
					</div>
					<div class="form-group col-md-3">
						<select class="form-control" name="pernikahan">
			                <option value="-" class="opt">Pernikahan</option>
			                <option  value="MENIKAH">Menikah</option>
			                <option   value="BELUM">Belum menikah</option>
			            </select>
					</div>
					<div class="form-group col-md-3">
						<input placeholder="IPK" class="form-control" name="ipk" id="ipk2" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" type="number" step="0.01" min="0">
					</div>
					<div class="form-group col-md-3">
						<input class="btn btn-success" type="submit" id="submitButton" name="submit" value="Proses" >
						<input class="btn btn-warning" type="reset"  value="Reset" >
					</div>
				</form>

	          </div>
	        </div>
  		</div>
	</div> -->

