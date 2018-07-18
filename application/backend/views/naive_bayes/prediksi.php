		<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master <small>Some examples to get you started</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <br>
                    <p class="text-muted font-13 m-b-30">
                      Ini adalah metode <code>Naive Bayes</code>
                    </p>

                  
				<form role="form" method="POST" action="<?php echo base_url();?>backend.php/naive_bayes/hasil_prediksi" onSubmit=\"return validasi(this)\">
            
					<div class="form-group col-md-3">
						<select class="form-control" name="kondisi_bahan_pokok">
			                <option value="-" class="opt">Kondisi Bahan Pokok</option>
			                <option  value="Baik" >Baik</option>
			                <option  value="Rusak">Rusak</option>
			            </select>
					</div>
					<div class="form-group col-md-3">
						<select class="form-control" name="cuaca">
			                <option value="-" class="opt">Cuaca</option>
			                <option  value="Baik">Baik</option>
			                <option  value="Buruk">Buruk</option>
			            </select>
					</div>
					<div class="form-group col-md-3">
						<select class="form-control" name="persediaan">
			                <option value="-" class="opt">Persediaan</option>
			                <option  value="Banyak">Banyak</option>
			                <option   value="kurang">Kurang</option>
			            </select>
					</div>
					<div class="form-group col-md-3">
						<select class="form-control" name="kondisi_kendaraan">
			                <option value="-" class="opt">Kondisi Kendaraan</option>
			                <option  value="Baik">Baik</option>
			                <option   value="Rusak">Rusak</option>
			            </select>
					</div>
					<div class="form-group col-md-3">
						<input class="btn btn-success" type="submit" id="submitButton" name="submit" value="Proses" >
						<input class="btn btn-warning" type="reset"  value="Reset" >
					</div>
				</form>

                  </div>
                </div>
              </div>
            </div>
          </div>

