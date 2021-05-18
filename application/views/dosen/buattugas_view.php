<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">

<link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" />
<?php $this->load->view('components/navbar'); ?>
<li><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<!-- <li><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li> -->
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Materi & Forum Diskusi</span></a> </li>
<li><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
<li class="active"><a href="dosen/tugas"><i class="icon icon-tasks"></i> <span>Manage Tugas</span></a> </li>
<li><a href="dosen/absensi"><i class="icon icon-tasks"></i> <span>Absensi</span></a> </li>

</div>
<!-- <li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/absensilaporandosen">Laporan Absensi</a></li>
		<li><a href="laporan/nilailaporandosen">Laporan Nilai</a></li>
	</ul>
</li> -->

</ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="dosen/home" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i> Home
      </a>
      <a href="dosen/buattugas" class="current">Buat Tugas</a>
    </div>
    <h1>
      <span class="icon-briefcase"></span>
      Manajemen Informasi <small>Tugas</small>
    </h1>
  </div>
  <hr />
  <div class="container-fluid">
    <div class="ini"></div>
    <div class="row-fluid">
      <div class="span8 offset2">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Upload tugas</h5>
          </div>
          <div class="widget-content nopadding">
            <form
              action="dosen/buattugas/simpan"
              class="form-horizontal"
              enctype="multipart/form-data"
              method="POST"
            >
              <input
                type="hidden"
                name="f"
                id="f"
                value="<?php echo $this->session->flashdata('berhasil');?>"
              />
              <input
                type="hidden"
                name="matakuliah"
                id="matakuliah"
                value="<?php echo $this->session->userdata('ses_kodemk');?>"
              />
              <input
                type="hidden"
                name="prodi"
                id="prodi"
                value="<?php echo $this->session->userdata('ses_prodi');?>"
              />
              <input
                type="hidden"
                name="semester"
                id="semester"
                value="<?php echo $this->session->userdata('ses_semester');?>"
              />
              <div class="control-group">
                <label class="control-label"
                  ><strong>Tipe tugas </strong></label
                >
                <div class="controls">
                  <select name="tipetugas" id="tipetugas">
                    <option selected disabled>Pilih</option>
                    <option value="tugas">Tugas</option>
                    <option value="quiz">Quiz</option>
                    <option value="uts">UTS</option>
                  </select>
				  <br>
				  <?php echo form_error('tipetugas'); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Judul Tugas</strong></label>
                <div class="controls">
                  <textarea
                    name="judultugas"
                    class="span11"
                    id="judultugas"
                    cols="5"
                    rows="3"
                  ></textarea>
                  <br />
                  <?php echo form_error('judultugas'); ?>
                </div>
              </div>
              <div class="control-group" style="margin-right: 10px">
                <label class="control-label"><strong>Isi Tugas</strong></label>
                <div class="controls">
                  <textarea
                    class="span12"
                    rows="4"
                    name="isitugas"
                    id="isitugas"
                    placeholder="Ketikan soal..."
                  ></textarea>
				  <br>
				  <?php echo form_error('isitugas'); ?>
                </div>
              </div>
			  <!-- <div class="control-group">
				<label class="control-label"><strong>Batas Pengumpulan</strong></label>
				<div class="controls">
					<input type="text" class="form-control" id="batastanggal" name="batastanggal">
					<br>
					<?php echo form_error('batastanggal'); ?>
				</div>
			</div> -->
              <div class="form-actions">
                <button
                  type="submit"
                  id="uploadtugas"
                  class="btn btn-success pull-right"
                >
                  <span class="icon-plus"></span> Upload Tugas
                </button>
                <button
                  type="reset"
                  class="btn btn-default pull-right"
                  onclick="window.location.reload()"
                >
                  <span class="icon-refresh"></span> Reset
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </div>
</div>

<?php $this->load->view('components/foot'); ?>
<script>
	$(document).ready(function () {
		flash = $('#f').attr('value');
		if (flash == "Tugas telah terupload.") {
			var divMessage = "<div class='alert alert-success'>" +
				"<strong>Berhasil! </strong> <span>" + flash + "</span>" +
				"</div>";
			$(divMessage)
				.prependTo(".ini")
				.delay(2000)
				.slideUp("slow");
		}
	});
</script>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('isitugas');
	CKFinder.setupCKEditor();
</script>
