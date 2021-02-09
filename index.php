<?php
//require_once 'conf/cfg.php';
date_default_timezone_set('Asia/Jakarta');
?>
<?php include 'view/header.php'; ?>


<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal1").modal('show');
	});
	function callperingatanModal() {
		$("#peringatanModal1").modal("show");
		return false;
	}
</script>

<!-- PopUp -->

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Zona Integritas</h4>
            </div>
            <div class="modal-body"> 
			  <a href ="#" target="_blank"> <img class="img-responsive" src="./img/zi_banner.jpeg"> </a>
            </div>
        </div>
    </div>
</div> 


<div id="peringatanModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Peringatan Dini</h4>
            </div>
            <div class="modal-body">
			<div id="warninglistmodal" class="owl-peringatan-dini"></div>
            </div>
        </div>
    </div>
</div>


<section id="meteorologi-geofisika" class="p-t-50">
	<div class="container">
		<div class="row">
			<div class="col-md-12 md-margin-bottom-20">
				<div class="prakicu-kota-besar no-space-carousel-block owl-carousel-v1 margin-bottom-10 md-margin-bottom-20">
					<div class="headline">
						<h4 id="jdlprakicu" class="pull-left">Prakiraan Cuaca</h4>
						<div class="owl-navigation">
							<div class="customNavigation">
							<a class="owl-btn prev-pk"><i class="fa fa-angle-left"></i></a>
							<a class="owl-btn next-pk"><i class="fa fa-angle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="prakicu-kota-besar-bg">
						<div id="prakicu" class="owl-prakicu-kota">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<div class="peringatan-dini-home owl-carousel-v1 md-margin-bottom-20">
			<div class="clearfix" align="left">
				<div class="peringatan-dini-home-head col-md-2 no-padding">
					<h4><span></span>Peringatan Dini</h4>
				</div>
				<div class="peringatan-dini-home-bg col-md-10">
					<div id="warninglist" class="owl-peringatan-dini">
					</div>
				</div>
			</div>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 p-t-10">
				<div class="gempabumi-home tab-v1">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#cuacajuanda">Cuaca Juanda </a></li>
						<li class=""><a data-toggle="tab" href="#prakicujuanda">Prakicu Juanda</a></li>
					</ul>
					<div class="gempabumi-home-bg margin-top-13">
						<div class="tab-content no-padding">
							<div id="cuacajuanda" class="tab-pane fade in active">
							</div>
							
							<div id="prakicujuanda" class="tab-pane fade in">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 p-t-10">
				<div class="gempabumi-home tab-v1">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#terkini">Gempabumi M ≥ 5.0</a></li>
						<li class=""><a data-toggle="tab" href="#dirasakan">Gempabumi Dirasakan</a></li>
					</ul>
					<div class="gempabumi-home-bg margin-top-13">
						<div class="tab-content no-padding">
							<div id="terkini" class="tab-pane fade active in">
								<div class="row">
									<div class="col-md-4 col-xs-6">
										<a href="data/eqmap.gif" class="fancybox img-hover-v1" rel="gallery1" title="Gempabumi Terkini M ≥ 5.0">
											<img class="img-responsive loaded" src="data/eqmap.gif" alt="">
										</a>
									</div>
									<div class="col-md-8 col-xs-6 gempabumi-detail no-padding">
										<ul class="list-unstyled">
											<li><span id="waktugempaterkini" class="waktu"></span></li>
											<li><span class="ic magnitude"></span><span id="magnitudegempaterkini"></span></li>
											<li><span class="ic kedalaman"></span><span id="kedalamangempaterkini"></span></li>
											<li><span class="ic koordinat"></span><span id="koordinatgempaterkini"></span></li>
										</ul>
									</div>
								</div>
								<ul class="list-unstyled gempabumi-detail no-bot">
									<li><span class="ic lokasi"></span><span id="lokasigempaterkini"></span></li>
									<li><span class="ic tsunami"></span><span id="tsunamigempaterkini"></span></li>
									<li><a class="more" href="../gempabumi/gempabumi-terkini.bmkg">Selengkapnya →</a></li>
								</ul>
							</div>
							
							<div id="dirasakan" class="tab-pane fade">
								<div class="row">
									<div class="col-md-4 col-xs-6">
										<a href="#" class="fancybox img-hover-v1" rel="gallery1" title="Gempabumi Dirasakan">
											<img class="img-responsive" src="#" alt="">
										</a>
									</div>
									<div class="col-md-8 col-xs-6 gempabumi-detail no-padding">
										<ul class="list-unstyled">
											<li><span id="waktugempadirasakan" class="waktu"></span></li>
											<li><span class="ic magnitude"></span><span id="magnitudegempadirasakan"></span></li>
											<li><span class="ic kedalaman"></span><span id="kedalamangempadirasakan"></span></li>
											<li><span class="ic koordinat"></span><span id="koordinatgempadirasakan"></span></li>
										</ul>
									</div>
								</div>
								<ul class="list-unstyled gempabumi-detail no-bot">
									<li><span class="ic lokasi"></span><span id="lokasigempadirasakan"></span></li>
									<li><span class="ic dirasakan"></span><span id="dirasakangempadirasakan"></span></li>
									<li><a class="more" href="../gempabumi/gempabumi-dirasakan.bmkg">Selengkapnya →</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			<div class="col-md-4 p-t-10 ">
				<div class="gempabumi-home tab-v1">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#">Info Cuaca Wisata</a></li>
					</ul>
					<div class="gempabumi-home-bg margin-top-13">
						<div class="tab-content no-padding">
							<a href="http://juanda.jatim.bmkg.go.id/webkantor/infocuaca.php" target='_blank'> <img class="img-responsive" src="./img/cuaca_wisata.jpeg" width:"200px"> </a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 p-t-10 ">
				<div class="gempabumi-home tab-v1">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#">Berita</a></li>
					</ul>
					<div class="gempabumi-home-bg margin-top-13">
						<div class="tab-content no-padding">
			<div class="berita-utama-home">
				<div class="master-slider ms-skin-black-2 round-skin" id="masterslider">
				</div>
			</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--
		<div class="row p-t-20">
			<div class="col-md-12 md-margin-bottom-20">
				 <a href ="prakicu.php"><img class="img-responsive" src="./img/posko-lebaran-2020-edit.jpg" alt="banner_zi"></a>
				 
			</div>
		</div>
		-->
	</div>
</section>


    <!-- Feature Start -->
   <!-- <section id="feature" class="bg_gray p-t-50">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8 col-xs-12 text-center">
                    <div class="feature_box">
						<div id="lightingDiv">
							<h3 id="issueDate"><?php if(isset($tanggalkata[0])) echo $tanggalkata[0]; ?></h3>
						</div>
						</br>
                        <div id="mapRain" style="height: 70vh;"></div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                    <div class="feature_box">
						<div class="showcase-selector">
							<div class="date-time-a">
								<ul class="list-unstyled" id="animateUl">
								</ul>
							</div>
							<div class="image-maklumat"> <img src='./img/maklumat.png' alt='maklumat' style='width:290px;height:187px';/></div>
							<br> 
							<div class="image-saran"> <img src='./img/saran_pengaduan.png' alt='saran_pengaduan' style='width:290px;height:145px';/></div> -->
	<!--					       <div class="image-prosedur"> <img src='./img/prosedur_pelayanan.jpg' alt='prosedur_pelayanan' style='width:290px;height:419px';/></div>
   						</div>
                    </div>
                </div>

            </div>
        </div>
    </section>-->
    <!-- Feature End --> 


<div class="container">
		<div class="row p-t-10 p-b-10">
			<div class="col-md-12 col-sm-6 col-xs-10">
        		<div id="our-partner-slider" class="owl-carousel">
					<div class="item"><a href="http://puslitbang.bmkg.go.id/jmg" target="_blank"><img src="images/jurnalbmkg.jpg" alt="jurnalbmkg"></a></div>
					<div class="item"><a href="https://juanda.jatim.bmkg.go.id/webkantor/wbs.php" target="_blank"><img src="images/pengaduan.png" alt="pengaduan"></a></div>
					<div class="item"><img src="images/mottobmkg.jpg" alt="motto"></div>
                                        <div class="item"><img src="img/maklumat.png" alt="maklumat" width="228px"></div>
					<div class="item"><a href="https://juanda.jatim.bmkg.go.id/webkantor/hasil_ikm" target="_blank"><img src="images/hasil_ikm.png" alt="hasil-ikm"></a></div>
					<div class="item"><a href="https://www.lapor.go.id/" target="_blank"><img src="images/lapor.jpg" alt="lapor"></a></div>
		        	        <div class="item"><a href="http://lpse.bmkg.go.id" target="_blank"><img src="images/lpse.jpg" alt="lpse"></a></div>
     				</div>
	        	</div>
		</div>
	</div>


    <!-- Feature Start -->

    <section id="feature" class="bg_gray p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('penerbangan.php','_blank');" style="cursor: pointer;">
                        <i class="icon-airplane"></i>
                        <h3>Penerbangan</h3>
                        <p>Informasi cuaca bandara update setiap 30 menit bersumber dari data METAR yang diterjemahkan.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('http://awscenter.bmkg.go.id/aws/','_blank');" style="cursor: pointer;height:325px;">
                        <i class="icon-cloud-sun-rain"></i>
                        <h3>AWS Center</h3>
                        <p>Memuat informasi AWS.<br><br><br></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('satelit.php','_blank');" style="cursor: pointer;height:325px;">
                        <i class="icon-globe"></i>
                        <h3>Satelit</h3>
                        <p>Memuat informasi Citra Satelit Himawari Jawa Timur update setiap 10 menit.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('../radar','_blank');" style="cursor: pointer;height:325px;">
                        <i class="icon-worldwide-pin"></i>
                        <h3>Radar dan SimonRain WOFI</h3>
                        <p>Informasi Citra Radar Cuaca Jawa Timur, update setiap 10 menit.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('buletin.php','_blank');" style="cursor: pointer;height:325px;">
                        <i class="icon-newspaper3"></i>
                        <h3>Buletin & Analisa</h3>
                        <p>Memuat informasi cuaca berupa evaluasi cuaca bulan lalu dan prakiraan cuaca sebulan kedepan.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('ikhtisar.php','_blank');" style="cursor: pointer;height:325px;">
                        <i class="icon-hours"></i>
                        <h3>Ikhtisar Cuaca</h3>
                        <p>Memuat rangkuman informasi cuaca bulan yang lalu di seluruh UPT BMKG di Jawa Timur  .</p>
                    </div>
                </div>          
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('infopers.php','_blank');" style="cursor: pointer;height:325px;">
                        <i class="icon-desktop"></i>
                        <h3>Siaran Pers</h3>
                        <p>Memuat informasi siaran pers berupa peringatan dini cuaca, iklim dan gelombang.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                    <div class="feature_box" onclick="window.open('https://www.bmkg.go.id/cuaca/citra-radar.bmkg','_blank');" style="cursor: pointer;">
                        <i class="icon-cloud-sun-lightning2"></i>
                        <h3>Radar Integrasi</h3>
                        <p>Informasi pengamatan citra radar cuaca BMKG di seluruh Indonesia.<br><br></p>
                    </div>
                </div>
            </div>	
        </div>
    </section>
    <!-- Feature End -->
	
    <!-- <script src="js/radar.js"></script> -->
    <script src="js/kantor.js"></script>
<?php include 'view/footer.php'; ?>
