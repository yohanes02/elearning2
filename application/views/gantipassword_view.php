<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->

<?php if($this->session->userdata("islogin") == "masukdsn") {?>

<!--sidebar-menu-->
<li class="active"><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<!-- <li><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li> -->
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Materi & Forum Diskusi</span></a> </li>
<li><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
<li><a href="dosen/tugas"><i class="icon icon-tasks"></i> <span>Manage Tugas</span></a> </li>
<li><a href="dosen/absensi"><i class="icon icon-tasks"></i> <span>Absensi</span></a> </li>

<?php } else if($this->session->userdata("islogin") == "masukmhs") {?>
<li class="active"><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<!-- <li><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li> -->
<!-- <li><a href="hmahasiswa/absensimhs"><i class="icon icon-home"></i> <span>Absensi</span></a> </li> -->
<!-- <li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li> -->
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Materi & Forum Diskusi</span></a> </li>
<li><a href="hmahasiswa/tugas"><i class="icon icon-group"></i> <span>Tugas</span></a> </li>
<li><a href="hmahasiswa/absensi"><i class="icon icon-group"></i> <span>Absensi</span></a> </li>

<?php } else if($this->session->userdata("islogin") == "masuk") {?>

<li class="active"><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="mahasiswa">Data Mahasiswa</a></li>
		<!-- <li><a href="absensi">Absensi</a></li>
		<li><a href="nilai">Nilai</a></li> -->
	</ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Matakuliah</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="matakuliah">Matakuliah</a>
		</li>
		<!-- <li><a href="materi"> Materi</a></li>
		<li><a href="soal">Pertanyaan</a></li>
		<li><a href="diskusi">Forum Diskusi</a></li> -->
	</ul>
</li>
<li><a href="hdosen"><i class="icon icon-user"></i> <span>Manage Dosen</span></a> </li>
<li><a href="admin"><i class="icon icon-user"></i> <span>Manage Admin</span></a> </li>

<?php } ?>

<!-- <li><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="mahasiswa">Data Mahasiswa</a></li>
		<li><a href="absensi">Absensi</a></li>
		<li><a href="nilai">Nilai</a></li>
	</ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Matakuliah</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="matakuliah">Matakuliah</a></li>
		<li><a href="materi"> Materi</a></li>
		<li><a href="soal">Pertanyaan</a></li>
		<li><a href="diskusi">Forum Diskusi</a></li>
	</ul>
</li>
<li><a href="admin"><i class="icon icon-user"></i> <span>Manage Admin</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/mahasiswalaporan">Laporan Mahasiswa</a></li>
		<li><a href="laporan/absensilaporan">Laporan Absensi</a></li>
		<li><a href="laporan/matakuliahlaporan">Laporan Matakuliah</a></li>
		<li><a href="laporan/nilailaporan">Laporan Nilai</a></li>
	</ul>
</li> -->


</ul>
</div>
<!--sidebar-menu-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="profil" class="current">Profil</a> </div>
		<h1><span class="icon-briefcase"></span>
			Profil <small>Pembelajaran Online</small></h1>
	</div>
	<hr>
	<div class="container">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3 offset1">
					<style>
						table {
							/* border-collapse: separate; */
							/* border-spacing: 0 1em; */
						}

						input {
							margin-top: 12px;
							width: 250px;
						}

						select {
							margin-top: 12px;
						}
					</style>
					<?php
					if ($this->session->userdata('islogin') == 'masukmhs') {
						$nim = $this->session->userdata('ses_id');
						echo "<form action='hmahasiswa/profil/ganti' method='POST'>";
						echo "<input type='hidden' name='nim' value='$nim'>";
					} else if($this->session->userdata('islogin') == 'masukdsn') {
						$dosenid = $this->session->userdata('ses_id');
						echo "<form action='dosen/profil/ganti' method='POST'>";
						echo "<input type='hidden' name='userid' value='$dosenid'>";
					} else {
						$userid = $this->session->userdata('ses_id');
						echo "<form action='profil/ganti' method='POST'>";
						echo "<input type='hidden' name='userid' value='$userid'>";
					}
					?>
					<div class="control-group
                            <?= form_error("password-lama")?"has-error":"" ?>">
						<label for="password-lama">Password Lama</label>
						<input type="password" id="password-lama" class="form-control" name="password-lama"
							value='<?= set_value("password-lama"); ?>'>
						<?= form_error("password-lama"); ?>
					</div>
					<div class="control-group
                            <?= form_error("password-baru")?"has-error":"" ?>">
						<label for="password-baru">Password Baru</label>
						<input type="password" id="password-baru" class="form-control" name="password-baru"
							value='<?= set_value("password-baru"); ?>'>
						<?= form_error("password-baru"); ?>
					</div>
					<div class="control-group
                            <?= form_error("konfirm")?"has-error":"" ?>">
						<label for="konfirm">Konfirm Password Baru</label>
						<input type="password" id="konfirm" class="form-control" name="konfirm"
							value='<?= set_value("konfirm"); ?>'>
						<?= form_error("konfirm"); ?>
					</div>
					<button class="btn btn-success">
						<span class="glyphicon glyphicon-floppy-disk"></span>
						Simpan
					</button>
					<a href="profil" class="btn btn-danger">
						<span class="glyphicon glyphicon-remove"></span>
						Batal
					</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<?php $this->load->view('components/jsfoot'); ?>
<script>

</script>
</body>

</html>
