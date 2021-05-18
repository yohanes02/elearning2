
var idmateri = "";
var idusr = "";
var idbtn = "";
var dataabsensi = [];
$(document).ready(function(){ 
    // url: "hmahasiswa/diskusimhs/data/" + diskusi,
    $('#data').DataTable({
        "ajax": {
            "type" : "POST",
            "url": "hmahasiswa/diskusimhs/data/d",
            "data": function ( d ) {
               return  $.extend(d, myData);
            }
        },
    });
    upload = "m";
    diskusi = "d";
	prodi = $("#prodimhs").val();
	sem = $("#smtmhs").val();
	getmk_prodi_sem(prodi, sem);

	// getmk_prodi_sem(prodi,sem).then(function() {
	// 	tampilmateridownload(upload);
	// });
	// getmhsabsensi();
	// promise1.then((value) => {
	// 	tampilmateridownload(upload);
	// })
	setTimeout(() => {
		tampilmateridownload(upload);
	}, 2000);
    tampildiskusi(diskusi);
    $("tbody#tbldownload").on("click","#lihat",function(){
        mode = "Upload";
        var file = $(this).data("file");
        var a="assets/materi/";
        var loc = a.concat(file); 
        // alert(loc);
        // window.location.href = loc;
        go = window.open(loc, '_blank');
        go.focus();
    });
    $("tbody#tbldownload").on("click","#absensi",function(){
		var mk = $(this).data("mk");
		var pertemuan = $(this).data("pertemuan");
		console.log(mk, pertemuan);
        absenpertemuan(mk, pertemuan);
    });
    $("tbody#tbldiskusi").on("click", "#lihat", function () {
        var pertemuan = $(this).data("pertemuan");  
        var judul = $(this).data("judul");
        var isi = $(this).data("isi");  
        idmateri = $(this).data("id");  
        $("#tampilsoal").css("display", "block");
        $("#tampilawal1").css("display", "none");
        $("#tampilawal2").css("display", "none");
        $("#idsoaltp").text(pertemuan);
        $("#tipesoaltp").text(judul);  
        $("#idmateri").val(idmateri);
        bacaisidiskusi(idmateri);
        ambilkomentar(idmateri);
    });
	$("tbody#tbldownload").on("click","#absensi",function(){
		$("#tdabsen").empty();
		$("#tdabsen").html("<b>Hadir</b>");
	});
    $("#kembali").click(function () {
        // location.reload();
        CKEDITOR.instances.kirimdiskusi.setData('');
        $(".komentarapp").remove();
        $("#tampilawal1").css("display", "block");
        $("#tampilawal2").css("display", "block");
		$("#tampilsoal").css("display", "none");		
    });
    $("#kirim").click(function(){
        event.preventDefault();
        idmateri = $("#idmateri").val();
        $("#kirimdiskusi").val(CKEDITOR.instances.kirimdiskusi.getData());
        kirimkomen();
        $(".komentarapp").remove();
    });
});

function getmk_prodi_sem(prodi, sem) {
	$.ajax({
		url: "hmahasiswa/diskusimhs/datamk/"+ prodi +"/" + sem,
		type: "POST",
		dataType: "JSON",
		success: function(data) {
			for (let i = 0; i < data.length; i++) {
				getmhsabsensi(data[i].kodemk);
			}
			console.log(dataabsensi);
		}
	})
}

function getmhsabsensi(kdmk) {
	idmhs = $("#userid").val();
	$.ajax({
		url: "hmahasiswa/diskusimhs/absenpermk/"+ idmhs +"/" + kdmk,
		type: "POST",
		dataType: "JSON",
		success: function(data) {
			console.log("data", data);
			dataabsensi.push(data[0]);
			console.log("mhs", dataabsensi);
		}
	})
}


function hapuskomentar(iddiskusi){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "hmahasiswa/diskusimhs/hapuskomen/"+iddiskusi,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    console.log(idmateri);
                    console.log(data);
					ambilkomentar(idmateri);
                }
            }
        });
    }
}

function tampilmateridownload(upload) {
	console.log("ABSENSI", dataabsensi);
	var mk = "";
	$.ajax({
		url: "hmahasiswa/diskusimhs/data/" + upload,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
	console.log("ABSENSI 2", dataabsensi);
			var html = "";
			var htmlAbsensi = "";
			var no = 0;
			for (i = 0; i < data.length; i++) {
				let ishadir = false;
				for (let j = 0; j < dataabsensi.length; j++) {
					idusr = $("#userid").val();            
					// console.log(dataabsensi[j]);
					// console.log(dataabsensi[j].nim, idusr);
					// console.log(dataabsensi[j].kodemk, data[i].matakuliah);
					if(dataabsensi[j].nim == idusr && dataabsensi[j].kodemk == data[i].matakuliah) {
						console.log("DAPAT");
						if(dataabsensi[j]["a"+data[i].pertemuan] == "Hadir") {
							ishadir = true;
						}
					}
				}
				
				if(ishadir) {
					htmlAbsensi = "<b>Hadir<b>";
				} else {
					htmlAbsensi = "<button id='absensi' class='btn btn-success btn-block' data-mk='"+data[i].matakuliah+"' data-pertemuan='"+data[i].pertemuan+"'>"+
					"<span class='icon-eye-open'></span> Hadir </button>";
				}
				
				if(mk == "") {
					mk = data[i].namamk;
					html += "<tr><td colspan='7'>"+mk+"</td></tr>";
					// no += 1;
				};
				if(data[i].namamk != mk) {
					no = 0;
					mk = data[i].namamk;
					html += "<tr><td colspan='7'>"+mk+"</td></tr>";
					// no += 1;
				};
                no += 1;
				html += "<tr>"+
                            "<td class='taskStatus'>"+no+"</td>"+
                            "<td>"+data[i].judulmateri+"</td>"+
                            "<td class='taskStatus'>"+data[i].namamk+"</td>"+                            
                            "<td class='taskStatus'>"+data[i].pertemuan+"</td>"+                            
                            "<td class='taskStatus'>"+data[i].tanggal+"</td>"+                            
                            "<td style='width:85px;'><button id='lihat' class='btn btn-info btn-block' data-file='" + data[i].file + "'>"+
									"<span class='icon-eye-open'></span> Lihat</button>"+
                            "</td>"+
							"<td style='width:85px; text-align:center' id='tdabsen'>"+htmlAbsensi+"</td>"+
                        "</tr>";
			}
			$("tbody#tbldownload").html(html);
		}
	})
}

// function tampilmateridownload2(upload) {
// 	$.ajax({
// 		url: "hmahasiswa/diskusimhs/data/" + upload,
// 		type: "POST",
// 		dataType: "JSON",
// 		success: function (data) {
// 			var html = "";
// 			for (i = 0; i < data.length; i++) {
//                 no = i+1;
// 				html += "<div class='container-fluid' id='tampilmateri"+i+"'>" +
// 							"<div class='row-fluid>" +
// 								"<div class='widget-box'>" +
// 									"<div class='widget-title'>" +
// 										"<span class='icon'> <i class='icon-list'></i> </span> <h5>Materi kuliah</h5>"+
// 									"</div>" +
// 									"<div class='widget-content nopadding'>" +
// 										"<div class='table-responsive table-hover'>" +
// 											"<table class='table table-bordered table-striped table-hover'>" +
// 												"<thead><tr>" +
// 													"<th style='width:50px;''>No</th>" + 
// 													"<th>Materi</th>" +
// 													"<th>Mata Kuliah</td>" +
// 													"<th>Pertemuan</td>" +
// 													"<th style='width:200px;'>Tanggal Publish</th>" +
// 													"<th>Action</th>" +
// 													"<th>Absensi</th>" +
// 												"</thead></tr>" +
// 												"<tbody id='tbldownload'>" +
// 												"</tbody>" +
// 											"</table>" +
// 										"</div>" +
// 									"</div>" +
// 								"</div>" +
// 							"</div>" +
// 						"</div>"
				
// 				"<tr>"+
//                             "<td class='taskStatus'>"+no+"</td>"+
//                             "<td>"+data[i].judulmateri+"</td>"+
//                             "<td class='taskStatus'>"+data[i].matakuliah+"</td>"+                            
//                             "<td class='taskStatus'>"+data[i].pertemuan+"</td>"+                            
//                             "<td class='taskStatus'>"+data[i].tanggal+"</td>"+                            
//                             "<td style='width:85px;'><button id='lihat' class='btn btn-info btn-block' data-file='" + data[i].file + "'>"+
// 									"<span class='icon-eye-open'></span> Lihat</button>"+
//                             "</td>"+
// 							"<td style='width:85px;'><button id='absensi' class='btn btn-success btn-block' data-mk='"+data[i].matakuliah+"' data-pertemuan='"+data[i].pertemuan+"'>"+
// 									"<span class='icon-eye-open'></span> Hadir</button>"+
//                             "</td>"+
//                         "</tr>";
// 			}
// 			$("tbody#tbldownload").html(html);
// 		}
// 	})
// }

function tampildiskusi(diskusi) {
	var mk = "";
	$.ajax({
		url: "hmahasiswa/diskusimhs/data/" + diskusi,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			var no = 0;
			for (i = 0; i < data.length; i++) {
				if(mk == "") {
					mk = data[i].namamk;
					html += "<tr><td colspan='5'>"+mk+"</td></tr>";
					// no += 1;
				};
				if(data[i].namamk != mk) {
					no = 0;
					mk = data[i].namamk;
					html += "<tr><td colspan='5'>"+mk+"</td></tr>";
					// no += 1;
				};
                no += 1;
                // no = i+1;
				html += "<tr>"+
                            "<td class='taskStatus'>"+no+"</td>"+
                            "<td class='taskStatus'>"+data[i].judulmateri+"</td>"+
                            "<td class='taskStatus'>"+data[i].namamk+"</td>"+
                            "<td class='taskStatus'>"+data[i].tanggal+"</td>"+
                            "<td style='width:100px;'>" +
                                "<button  class='btn btn-info btn-block' id='lihat' data-id='"+ data[i].idmateri +"' data-isi='"+ data[i].file +"' data-judul='"+ data[i].judulmateri +"' data-pertemuan='"+ data[i].pertemuan +"'>"+
                                "<span class='icon-circle-arrow-right'></span> Masuk " +
                                "</button>" +
                            "</td>" +
                        "</tr>";
			}
            $("tbody#tbldiskusi").html(html);
		}
	})
}

// =============================================

function kirimkomen() {
	$.ajax({
		type: "POST",
		url: "hmahasiswa/diskusimhs/kirimkomen/",
		dataType: "JSON",
		data: $('#formkirim').serialize(),
		success: function (data) {
			if (data.status) {
                CKEDITOR.instances.kirimdiskusi.setData('');
                ambilkomentar(idmateri);
				// showalert("success", "Soal terkirim ke mahasiswa!");				
			}else{
                ambilkomentar(idmateri);
			}
			
		}
	});
	return false;
}

function balas(idbtn){
    var tes = $( idbtn ).attr( "data-isi" );
    CKEDITOR.instances['kirimdiskusi'].setData(tes);
    $("#kirim").focus();
}

function ambilkomentar(idmateri) {
	$.ajax({
		type: "ajax",
        url: "hmahasiswa/diskusimhs/ambilkomentar/"+idmateri,
        dataType: "JSON",
		success: function (data) {
			$('table#kir tr').remove();
            idusr = $("#userid").val();            
			var html1 = "";
			for (i = 0; i < data.length; i++) {
                idbtn = "balas"+ data[i].iddiskusi +"";
                var balasisi = "<blockquote><strong>"+ data[i].nama +" </strong>:"+ data[i].komentar +" </blockquote></br>";
                if (data[i].userid == idusr) {                    
                    // console.log(balasisi);
                    html1 += 
                    "<tr><td colspan='2' align='right' style='font-size:10px;'>"+
                    "<button data-isi='"+ balasisi +"' id='balas"+ data[i].iddiskusi +"' name='balas"+ data[i].iddiskusi +"' onclick='balas("+ idbtn +");' class='btn btn-info pull-right'>"+
                    "<span class='icon-share-alt'></span></button>"+
                    "<button id='"+ data[i].iddiskusi +"' name='"+ data[i].iddiskusi +"' onclick='hapuskomentar("+data[i].iddiskusi+");' class='btn btn-danger pull-right'>"+
                    "<span class='icon-trash'></span></button> </td></tr>"+
                    // =====
                            "<tr style='vertical-align: top;' class='komentarapp'>"+
                            "<td style='width:100px; height:130px;'>"+
                                "<img style='width:100px; height:130px;' "+
                                    "src='./assets/img/fotomahasiswa/"+ data[i].userid +".jpg' alt=''>"+
                                    "<div class='namafotodiskusi'>"+ data[i].nama +"</div>"+
                            "</td>"+
                            // ===============================
                            "<td>"+
                                "<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].komentar +"</div>"+
                            "</td>"+
                            "</tr>"+
                            "<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tanggal +"</td></tr>"+
                            "<tr class='komentarapp'><td colspan='2'><hr></td></tr>";  
                } else {
                    html1 += 
                            "<tr><td colspan='2' align='right' style='font-size:10px;'>"+
                            "<button data-isi='"+ balasisi +"' id='balas"+ data[i].iddiskusi +"' name='balas"+ data[i].iddiskusi +"' onclick='balas("+ idbtn +");' class='btn btn-info pull-right'>"+
                            "<span class='icon-share-alt'></span></button>"+
                            // =====
                            "<tr style='vertical-align: top;' class='komentarapp'>"+
                            "<td style='width:100px; height:130px;'>"+
                                "<img style='width:100px; height:130px;' "+
                                    "src='./assets/img/fotomahasiswa/"+ data[i].userid +".jpg' alt=''>"+
                                    "<div class='namafotodiskusi'>"+ data[i].nama +"</div>"+
                            "</td>"+
                            // ===============================
                            "<td>"+
                                "<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].komentar +"</div>"+
                            "</td>"+
                            "</tr>"+
                            "<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tanggal +"</td></tr>"+
                            "<tr class='komentarapp'><td colspan='2'><hr></td></tr>";
                };                
			}
            $("#kir").prepend(html1);
		}
	})
}

function bacaisidiskusi(idmateri) {
	$.ajax({
		url: "hmahasiswa/diskusimhs/ambilisi/" + idmateri,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
            nama = $("#nama").val();
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr style='vertical-align: top;'>"+
                    "<td style='width:100px; height:130px;'>"+
                        "<img style='width:100px; height:130px;' "+
                            "src='./assets/img/fotomahasiswa/"+ data[i].idpengirim +".jpg' alt=''>"+
                            "<div class='namafotodiskusi'>"+ data[i].namapengirim +"</div>"+
                    "</td>"+
                    // ===============================
                    
                    "<td>"+
                        "<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].file +"</div>"+
                    "</td>"+
                    "</tr>"+
                    "<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tanggal +" </td></tr>"+
                    "<tr><td colspan='2'><hr></td></tr>";
			}
            $("table#isidiskusi").html(html);		
            CKEDITOR.replaceAll();	
		}
	})
}

function absenpertemuan(mk, pertemuan) {
    $.ajax({
		url: "hmahasiswa/absensimhs/absenpertemuan/"+mk+"_"+pertemuan,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			console.log("TEST");
			if (data.status) {
				console.log("TEST2");
				// $("#absensi"+idxbutton).prop('disabled', true);
				// redirect("hmahasiswa/home");
			}
		}
	});
}

