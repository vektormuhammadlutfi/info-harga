<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>DINAS PERINDUSTRIAN DAN PERDAGANGAN </h3>
					<p>“Meningkatnya kualitas sektor industri dan perdagangan berbasis ekonomi kerakyatan” .</p>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li>DISPERINDAG</li>
						<li><a href="#">Tentang</a></li>
						<li><a href="#">Struktur Organisasi</a></li>
						<li><a href="#">Visi</a></li>
						<li><a href="#">Misi</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li>MENU PASAR</li>
						 <?php 
			              $data_pasar = $this->Komoditas_model->get_pasar();
			              foreach ($data_pasar as $row)
			              {
			              ?>
			                    <li><a href='<?php echo base_url('pasar/data/'.$row->id_pasar); ?>'>Pasar <?php echo $row->nama_pasar; ?></a></li>
			              <?php
			              }
			              ?>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2017 DINAS PERINDUSTRIAN DAN PERDAGANGAN. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="#" target="_blank">Muhammad Lutfi</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>