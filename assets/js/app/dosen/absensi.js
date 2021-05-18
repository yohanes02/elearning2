$(document).ready(function() {
	tampilabsensi();
});

function tampilabsensi() {
	$.ajax({
		type: "ajax",
		url: "dosen/absensi/datapermk/",
		dataType: "JSON",
		success: function(data) {
			var html = "";
			for (let i = 0; i < data.length; i++) {
				html += "<tr style='color: #c7184b;'>"+
							"<td style='text-align:center'>"+data[i].nim+"</td>" +
							"<td>"+data[i].namamhs+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a1)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a2)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a3)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a4)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a5)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a6)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a7)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a8)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a9)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a10)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a11)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a12)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a13)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a14)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a15)+"</td>" +
							"<td style='text-align: center'>"+konversiAbsensi(data[i].a16)+"</td>" +
						"</tr>";
			}
			$("tbody#tabelabsenmhs").html(html);
		}
	});
}
