<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" />
<?php $this->load->view('components/navbar'); ?>
<li><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="active"><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li>
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>
<li><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
<li><a href="dosen/nilai"><i class="icon icon-trophy"></i> <span>Penilaian</span></a> </li>
<!-- <li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/absensilaporandosen">Laporan Absensi</a></li>
		<li><a href="laporan/nilailaporandosen">Laporan Nilai</a></li>
	</ul>
</li> -->
</ul>
	</div>
	<!--sidebar-menu-->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="dosen/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
					Home</a> <a href="dosen/subbuatsoal" class="current">Tambah Soal</a> </div>
			<h1><span class="icon-briefcase"></span>
				Buat Soal
		</div>
		<hr>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="quick-actions_homepage offset2">
					<ul class="quick-actions">
						<li class="bg_lo span3"> <a href="dosen/soalesai"> <i class="icon-book"></i>Buat Essai </a> </li>
						<!-- <li class="bg_lg span3"> <a href="dosen/soalpilgan"> <i class="icon-th-list"></i> Buat Pilihan Berganda</a> -->
						</li>
					</ul>
				</div>
			</div>
		</div>
		<hr>
	</div>






<?php $this->load->view('components/foot'); ?>
<?php $this->load->view('components/jsfoot'); ?>

</body>
</html>
