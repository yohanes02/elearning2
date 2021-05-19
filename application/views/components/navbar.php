</head>
<body>

	<!--Header-part-->
	<div id="header">
		<h1><a href="home">E-Learning</a></h1>
	</div>
	<!--close-Header-part-->
	<!--top-Header-menu-->
	<div id="user-nav" class="navbar navbar-inverse">
		<ul class="nav">
			<li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
					data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span
						class="text">Welcome <?= $this->session->userdata("ses_nama"); ?> </span><b
						class="caret"></b></a>
				<!-- <ul class="dropdown-menu">
				<?php if ($this->session->userdata("islogin")=='masuk' || $this->session->userdata("islogin")=='masukdsn') { ?>
					<li><a href="profil"><i class="icon-user"></i> Profil Pengguna</a></li>
					<li><a href="profil/gantipass"><i class="icon-lock"></i> Ganti Password</a></li>
				<?php } else if ($this->session->userdata("islogin") == 'masukmhs'){?>
					<li><a href="hmahasiswa/profil"><i class="icon-user"></i> Profil Pengguna</a></li>
					<li><a href="hmahasiswa/profil/gantipass"><i class="icon-lock"></i> Ganti Password</a></li>
				<?php } ?>
				</ul> -->

				<ul class="dropdown-menu">
<?php if($this->session->userdata("islogin") == 'masuk') { ?>
					<!-- <li>
						<a href="profil"><i class="icon-user"></i> Profil Pengguna</a>
					</li> -->
					<li><a href="profil/gantipass"><i class="icon-lock"></i> Ganti Password</a></li>
<?php } else if($this->session->userdata("islogin") == 'masukdsn') { ?>
					<li>
						<a href="dosen/profil"><i class="icon-user"></i> Profil Pengguna</a>
					</li>
					<li><a href="profil/gantipass"><i class="icon-lock"></i> Ganti Password</a></li>
<?php } else if($this->session->userdata("islogin") == 'masukmhs') { ?>
					<li>
						<a href="hmahasiswa/profil"><i class="icon-user"></i> Profil Pengguna</a>
					</li>
					<li><a href="hmahasiswa/profil/gantipass"><i class="icon-lock"></i> Ganti Password</a></li>
<?php } ?>
				</ul>
			</li>
			<?php if ($this->session->userdata("islogin")=='masuk') { ?>
				<li><a title="" href="logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
			<?php }else if ($this->session->userdata("islogin")=='masukmhs') { ?>
				<?php
					// $prdnav = $this->session->userdata("ses_prodi");
					// $semnav = $this->session->userdata("ses_semester");
					// $mknav = $this->db->query("select * from tblmatakuliah where prodi='$prdnav' and semester='$semnav'");
					// foreach($mknav->result() as $rwonav)
					// {
					// 	$matkulnav = $rwonav->namamk;
					// 	$kdmknav = $rwonav->kodemk;
					// }	
					// $this->session->set_userdata('ses_kodemk', $kdmknav);
				?>
				
				<!-- <input type="hidden" name="kdmknav" id="kdmknav" value="<?= $kdmknav ?>"> -->
				<!-- <li><a title=""><i class="icon icon-book"></i> Matakuliah <span class="text" id="mknav"> <?= $matkulnav ?></span></a> -->
				<li><a title="" href="<?= site_url("logout")?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
			<?php }else if ($this->session->userdata("islogin")=='masukdsn') { ?>
				<?php
					$kdmknav = $this->session->userdata("ses_kodemk");
					$mknav = $this->db->query("select * from tblmatakuliah where kodemk='$kdmknav'");
					foreach($mknav->result() as $rwonav)
					{
						$matkulnav = $rwonav->namamk;
					}	
					$this->session->set_userdata('ses_kodemk', $kdmknav);
				?>
				<li><a title=""><i class="icon icon-book"></i> Matakuliah <span class="text" id="mknav"> <?= $matkulnav; ?></span></a>
				<li><a title="" href="<?= site_url("logout")?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
			<?php } ?>
			</li>
		</ul>
	</div>
	<!--close-top-Header-menu-->
	<!--sidebar-menu-->
	<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
		<ul>
			<li>
				<div class="bingkai">
					<div class="pasfoto">
					<?php
					$file = "./assets/img/fotomahasiswa/".$this->session->userdata("ses_id").".jpg";
					$file_headers = @get_headers($file);
					// print_r($file_headers);
					if(!$file_headers || $file_headers[0] == 'HTTP/1.0 404 Not Found') { ?>
						<img src="<?= base_url("assets/img/avatar1.png")?>" alt="">
					<?php }
					else { ?>
						<img src="<?= base_url("assets/img/fotomahasiswa/".$this->session->userdata("ses_id").".jpg")?>" alt="">
					<?php }
					?>
					</div>
					<div class="namapasfoto" >
						<p><?= $this->session->userdata("ses_nama"); ?></p>
					</div>
				</div>
			</li>
