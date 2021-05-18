var idtugas = "";
var iddosen = "";
var idbtn = "";

$(document).ready(function() {
	tampiltugas();
	$("tbody#tbltugas").on("click", "#lihat", function () {
		var judul =$(this).data("judul");
		var tipe =$(this).data("tipe");
		idtugas =$(this).data("id");
		$("#lihattugas").css("display", "block");
        $("#tampiltugas").css("display", "none");
        $("#tampilawal2").css("display", "none");
        $("#tipetugas").text(tipe);
        $("#judultugas").text(judul);
        $("#idtugas").val(idtugas);
		isitugas(idtugas);
		ambilkomentar(idtugas);
	})

	$("#kembali").click(function () {
        // location.reload();
        CKEDITOR.instances.kirimjawaban.setData('');
        // $(".komentarapp").remove();
        $("#tampiltugas").css("display", "block");
        $("#tampilawal2").css("display", "block");
		$("#lihattugas").css("display", "none");		
    });
	$("#kirim").click(function() {
		event.preventDefault();
		// idtugas = $("#idtugas").val();
        $("#kirimjawaban").val(CKEDITOR.instances.kirimjawaban.getData());
		kirimkomentar();
	})
});

function tampiltugas() {
	$.ajax({
		url: "hmahasiswa/tugas/data/",
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			var mk = "";
			var no = "";
			for (let i = 0; i < data.length; i++) {
				// no = i + 1;
				if(mk == "") {
					mk = data[i].namamk;
					html += "<tr><td colspan='6'>"+mk+"</td></tr>";
					// no += 1;
				};
				if(data[i].namamk != mk) {
					no = 0;
					mk = data[i].namamk;
					html += "<tr><td colspan='6'>"+mk+"</td></tr>";
					// no += 1;
				};
                no += 1;
				html += "<tr>" +
							"<td class='taskStatus'>" + no + "</td>"+
							"<td class='taskStatus'>" + data[i].namamk + "</td>"+
							"<td class='taskStatus'>" + data[i].tipe + "</td>"+
							"<td class='taskStatus'>" + data[i].judultugas + "</td>"+
							"<td class='taskStatus'>" + data[i].tanggal_upload + "</td>"+
							"<td style='width:100px;'>" +
                                "<button  class='btn btn-info btn-block' id='lihat' data-id='"+ data[i].idtugas +"' data-isi='"+ data[i].isi +"' data-judul='"+ data[i].judultugas +"' data-tipe='"+data[i].tipe+"'>"+
                                "<span class='icon-circle-arrow-right'></span> Masuk " +
                                "</button>" +
                            "</td>" +
						"</tr>";
			}
			$("tbody#tbltugas").html(html);
		}
	})
}

function isitugas(idtugas) {
	$.ajax({
		url: "hmahasiswa/tugas/ambilisi/" + idtugas,
		type: "POST",
		dataType: "JSON",
		success: function(data){
            nama = $("#nama").val();
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr style='vertical-align: top;'>"+
                    "<td style='width:100px; height:130px;'>"+
                        "<img style='width:100px; height:130px;' "+
                            "src='./assets/img/fotomahasiswa/"+ data[i].iddosen +".jpg' alt=''>"+
                            "<div class='namafotodiskusi'>"+ data[i].namadosen +"</div>"+
                    "</td>"+
                    // ===============================
                    
                    "<td>"+
                        "<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].isi +"</div>"+
                    "</td>"+
                    "</tr>"+
                    "<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tanggal_upload +" </td></tr>"+
                    "<tr><td colspan='2'><hr></td></tr>";
			}
            $("table#isitugas").html(html);	
		}
	})
}

function kirimkomentar() {
	$.ajax({
		type: "POST",
		url: "hmahasiswa/tugas/kirimkomen/",
		dataType: "JSON",
		data: $('#formkirim').serialize(),
		success: function (data) {
			if (data.status) {
				console.log("DATTTAAAAA", idtugas);
                CKEDITOR.instances.kirimjawaban.setData('');
                ambilkomentar(idtugas);
				// showalert("success", "Soal terkirim ke mahasiswa!");				
			}else{
                ambilkomentar(idtugas);
			}
		}
	});
	return false;
}

function ambilkomentar(idtugas) {
	$.ajax({
		type: "ajax",
		url: "hmahasiswa/tugas/ambilkomentar/" + idtugas,
		dataType: "JSON",
		success: function(data) {
			$('table#kir tr').remove();
			var html = "";
			for (let i = 0; i < data.length; i++) {
				idbtn = "balas"+ data[i].iddiskusi +"";
                var balasisi = "<blockquote><strong>"+ data[i].namamhs +" </strong>:"+ data[i].jawaban +" </blockquote></br>";
				html += 
						// "<tr><td colspan='2' align='right' style='font-size:10px;'>"+
						// "<button data-isi='"+ balasisi +"' id='balas"+ data[i].idjawaban +"' name='balas"+ data[i].idjawaban +"' onclick='balas("+ idbtn +");' class='btn btn-info pull-right'>"+
						// "<span class='icon-share-alt'></span></button>"+
						// =====
						"<tr style='vertical-align: top;' class='komentarapp'>"+
						"<td style='width:100px; height:130px;'>"+
							"<img style='width:100px; height:130px;' "+
								"src='./assets/img/fotomahasiswa/"+ data[i].idmhs +".jpg' alt=''>"+
								"<div class='namafotodiskusi'>"+ data[i].namamhs +"</div>"+
						"</td>"+
						// ===============================
						"<td>"+
							"<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].jawaban +"</div>"+
						"</td>"+
						"</tr>"+
						"<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tgl_upload +"</td></tr>"+
						"<tr class='komentarapp'><td colspan='2'><hr></td></tr>";
			}
            $("#kir").prepend(html);
		}
	})
}
