<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->
<li class="active"><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<!-- <li><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li> -->
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Materi & Forum Diskusi</span></a> </li>
<li><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
<li><a href="dosen/tugas"><i class="icon icon-tasks"></i> <span>Manage Tugas</span></a> </li>
<li><a href="dosen/absensi"><i class="icon icon-tasks"></i> <span>Absensi</span></a> </li>
<!-- <li><a href="dosen/nilai"><i class="icon icon-trophy"></i> <span>Penilaian</span></a> </li> -->
<!-- <li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/absensilaporandosen">Laporan Absensi</a></li>
		<li><a href="laporan/nilailaporandosen">Laporan Nilai</a></li>
	</ul>
</li>  -->
</ul>
</div>

<div id="content">
	<div id="content-header">
		<div id="breadcrumb">
			<a href="dosen/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
			<a href="dosen/profil" class="current">Profil</a>
		</div>
		<h1><span class="icon-briefcase"></span> Profil <small>Pembelajaran Online</small></h1>
	</div>
	<hr>
	<div class="container">
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-ganti">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Form <span id="mode"></span> Mahasiswa</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="form2">
							<div class="control-group">
								<label class="control-label" for="passwordlama">Password Lama</label>
								<div class="controls">
									<input type="text" id="passwordlama" placeholder="Password Lama"
										autocomplete="new-password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="passwordbaru1">Password Baru</label>
								<div class="controls">
									<input type="password" id="passwordbaru1" placeholder="Password Baru"
										autocomplete="new-password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="passwordbaru2">Password</label>
								<div class="controls">
									<input type="password" id="passwordbaru2" placeholder="Ulang Password"
										autocomplete="new-password">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-danger">Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- ./modal -->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span5 offset1">
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
					<form enctype="multipart/form-data">
						<table style="font-size:20px; font-family:serif;">
							<tr>
								<td style="width:130px;"><label for="iddosen"></label>User ID</td>
								<td></td>
								<td><input type="text" readonly id="iddosen" name="iddosen"
								value="<?= $profil->iddosen ?>"></td>
							</tr>
							<tr>
								<td style="width:130px;"><label for="nama"></label>Nama</td>
								<td></td>
								<td><input type="text" id="nama" name="nama"
								value="<?= $profil->nama ?>"></td>
							</tr>
							<tr>
								<td style="width:130px;"><label for="alamat"></label>Alamat</td>
								<td></td>
								<td>
								<textarea name="alamat" id="alamat" cols="40"
								rows="3"><?= $profil->alamat ?></textarea>
								</td>
							</tr>
							<tr>
								<td style="width:130px;"><label for="email"></label>E-mail</td>
								<td></td>
								<td><input type="text" id="email" name="email" value="<?= $profil->email ?>"></td>
							</tr>
							<tr>
								<td style="width:130px;"><label for="tanggallahir"></label>Tanggal lahir</td>
								<td></td>
								<td><input type="date" id="tanggallahir" name="tanggallahir"
								value="<?= $profil->tanggallahir ?>"></td>
							</tr>
							<tr>
								<td style="width:130px;"><label for="agama"></label>Agama</td>
								<td></td>
								<td>
									<select id="agama" name="agama" class="form-control">
										<option value="<?= $profil->agama ?>" selected disabled hidden>
											<?= $profil->agama ?></option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Buddha">Buddha</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</td>
							</tr>
							<tr>
<?php 
if ($profil->jekel = 'L') {
$j = 'Laki-Laki';
}else{
$j = 'Perempuan';
};
// echo $j;
?>
								<td style="width:130px;"><label for="jekel"></label>Jenis Kelamin</td>
								<td></td>
								<td>
									<select id="jekel" name="jekel" class="form-control">
										<option value="<?= $profil->jekel ?>" selected disabled hidden><?= $j ?>
										</option>
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width:130px;"><label for="telepon"></label>Telepon</td>
								<td></td>
								<td><input type="text" id="telepon" name="telepon" value="<?= $profil->telepon ?>"></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="span2">
					<form id="formgbr" enctype="multipart/form-data">
						<img style="margin-top:12px;" id="tampil"
						src="<?= base_url("assets/img/fotomahasiswa/".$this->session->userdata("ses_id").".jpg")?>"
						alt="your image" />
						<input type='file' name ="userfile" id="image" onchange="readURL(this)"/>
					</form>
					<button id="updategbr" class="btn btn-warning">Simpan Gambar</button>
				</div>
				<div class="span12 offset2">
					<button class="btn btn-info" id="batal" style="margin-top:20px; margin-left:10px;">
					<span class="icon-floppy-disk"></span> Batal</button>
					<button class="btn btn-warning" id="simpan" style="margin-top:20px; ">
					<span class="icon-floppy-disk"></span> Simpan</button>
					<!-- <button class="btn btn-danger" id="gantipassword" style="margin-top:20px; ">
					<span class="icon-floppy-disk"></span> Ganti password</button> -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<?php $this->load->view('components/jsfoot'); ?>
<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#tampil').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#image").change(function () {
		readURL(this);
	});

	$("#simpan").click(function () {
		alert('Profil disimpan!');
		simpanabsen();
	});

	$("#updategbr").click(function () {
		alert('Foto disimpan!');
		simpangambar();
	});

	$("#gantipassword").click(function () {
		window.location.href = "profil/gantipass";
	});

	function simpanabsen() {
		console.log($("form"));
		$.ajax({
			url: "dosen/profil/simpan",
			type: "POST",
			data: $("form").serialize(),
			dataType: "JSON",
			success: function (data) {
				window.location.reload();
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$('#namafoto').load(document.URL + ' #namafoto');
			}
		})
	}

	function simpangambar() {
		var form = $('form')[2]; // You need to use standard javascript object here
		console.log(form);
		var formData = new FormData(form);

		$.ajax({
			url: "dosen/profil/uploadgbr",
			data: formData,
			type: "POST", //ADDED THIS LINE
			// THIS MUST BE DONE FOR FILE UPLOADING
			contentType: false,
			processData: false,
			complete: function(data){
				window.location.reload();
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				// $('#namafoto').load(document.URL + ' #namafoto');
			}
			// ... Other options like success and etc
		})
	}
</script>
</body>
</html>
