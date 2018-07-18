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

                  
				<form role="form" method="POST" action="<?php echo base_url();?>backend.php/naive_bayes/metode_view" onSubmit=\"return validasi(this)\">
            
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
            </div>
          </div>

