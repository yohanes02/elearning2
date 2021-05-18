<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->
<li><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<!-- <li><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li> -->
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Materi & Forum Diskusi</span></a> </li>
<li><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
<li><a href="dosen/tugas"><i class="icon icon-tasks"></i> <span>Manage Tugas</span></a> </li>
<li class="active"><a href="dosen/absensi"><i class="icon icon-tasks"></i> <span>Absensi</span></a> </li>
</ul>
</div>

<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="absensi" class="current">Absensi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Lihat Absensi <small><span id="nim"><?= $this->session->userdata("ses_id"); ?></span> - <?= $this->session->userdata("ses_nama"); ?></small></h1>
	</div>
	<hr>
	<div class="container-fluid">	
		<div class="row-fluid">
			<div class="span12">				
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Data Absensi Pembelajaran Online</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>NIM</th>
									<th>Nama</th>
									<!-- <th>Mata Kuliah</th> -->
									<th>a1</th>
									<th>a2</th>
									<th>a3</th>
									<th>a4</th>
									<th>a5</th>
									<th>a6</th>
									<th>a7</th>
									<th>a8</th>
									<th>a9</th>
									<th>a10</th>
									<th>a11</th>
									<th>a12</th>
									<th>a13</th>
									<th>a14</th>
									<th>a15</th>
									<th>a16</th>
									<!-- <th align="center">Action</th> -->
								</tr>
							</thead>
							<tbody id="tabelabsenmhs">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/dosen/absensi.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>
