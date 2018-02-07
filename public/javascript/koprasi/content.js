var category ;
ready(function(){

	$('.currency').maskMoney({thousands:'.', decimal:',', allowZero: true, precision: 0});
    $('.currency2').maskMoney({thousands:'', precision:0});
    $('.currency3').maskMoney({thousands:'', decimal:',', precision:2});

	$(".percent").keyup(function(){
		var value = $(this).val();
		var res = parseFloat(value.replace(/,/g, "."));
		if(res > 100)
			$(this).val(100);
	});

	$('[id^=category]').change(function(){
		var value = $(this).val();

		if(value > 0)
		{

			$.ajax({
				type: "GET",
				url: "criteria",
				data : {
					category : value
				},
				dataType: 'json',
				success: function(data){
					var content = "";
					$("#table-criteria").html("");
					
					
					$.each( data, function( key, value ) {
						content += "<tr>"+
										"<td style='width:38%'>"+value.label+" </td>" +
										"<td style='width:20px;' align='center'>:</td>"+
										"<td>" +
											"<select style='margin-top: 10px;' class='select-noinline-form' id='criteria' name='criteria[1]'>"+
												"<option value=''>- Silahkan Pilih -</option>";

						$.each( value.selection, function( subkey, subvalue ) {
							content += "<option value='"+subvalue.id+"'>"+subvalue.value+"</option>";
						});

						content += "</select></td></tr>";						
					});

					$("#table-criteria").prepend(content);
				}
			});
		}
	});

	$('[id^=harga-grosir-]').keyup(function(){
		change_price_angota($(this).data("id"));
	});

	$('[id^=discont]').keyup(function(){
		for (var i = 1; i <= 5; i++) {
			var att = "#harga-grosir-"+i;
			var value = parseFloat($(att).val().replace(/\./g, ""));	
			if(value > 0)
				change_price_angota(i)				
		}
	});

	function change_price_angota(id)
	{
		var atr = "#harga-grosir-angota-";
		var att2 = "#harga-grosir-"+id;
		var value = parseFloat($(att2).val().replace(/\./g, ""));
		var discont = parseFloat($("#discont").val().replace(/,/g, "."));
		var discont_koprasi = parseFloat($("#discont_koprasi").val().replace(/,/g, "."));
		var result_1 = value - (value * (discont / 100));
		var result_2 = parseInt(result_1 - (result_1 * (discont_koprasi / 100)));
		var result = result_2.formatMoney(0,'.',',');

		$(atr+id).val(result);
	}

	Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
	    var n = this,
	        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
	        decSeparator = decSeparator == undefined ? "." : decSeparator,
	        thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
	        sign = n < 0 ? "-" : "",
	        i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
	        j = (j = i.length) > 3 ? j % 3 : 0;
	    return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
	};

	$(".delete-form-fill").click(function(){
		var id = $(this).data('id');
		var next = id + 1;
		var att_from = "#jumlah-ke-";
		var att_to = "#jumlah-sampai-";
		var att_price = "#harga-grosir-";
		var att_error = "#error-grosir-";
		var atr_grosir_angota = "#harga-grosir-angota-";
		var error_mark = "#delete-form-fill-";

		for (var i = id ; i < 6; i++) {
			if(i !== 1){
				$(att_from+i).attr("readonly", "readonly");
				$(att_to+i).attr("readonly", "readonly");
				$(att_price+i).attr("readonly", "readonly");
			}

			$(att_from+i).val("");
			$(att_to+i).val("");
			$(att_price+i).val("");
			$(atr_grosir_angota+i).val("");
			$(att_error+i).html("");
			$(error_mark+i).hide();			
		}
	});	

	var fade_out = function() {
	  $("#message_error").fadeOut().empty();
	}

	setTimeout(fade_out, 2000);

	// $("#addProduct").validate({
	// 	rules: {
	// 		nama_barang: "required",
	// 		category: "required",
	// 		deskripsi: "required"
	// 	},
	// 	messages: {
	// 		nama_barang: "kolom harus diisi",
	// 		category: "kolom harus dipilih",
	// 		deskripsi: "kolom harus diisi"
	// 	}
	// });

	$("#grosir").click(function(){
		var status_grosir = parseInt($("#status_grosir").val());
		if(status_grosir == 0)
		{
			$("#status_grosir").val(1);
			$("#harga-grosir").show();
			$("#grosir").html("- Hapus harga grosir");
		}else {
			$("#status_grosir").val(0);
			$("#harga-grosir").hide();
			$("#grosir").html("+ Tambah Harga Grosir");
		}
	});

    $.ajax({
		type: "GET",
		url: "category/ajax",
		dataType: 'json',
		success: function(data){
			category = data;
			$("#category").html("<option value=''>-silahkan pilih-</option>");
			$.each( data.parent_0, function( key, value ) {
				var option = "<option value='"+value.id+"'>"+value.name+"</option>";
				$("#category").append(option);
			});

			$("#category3").hide();
		}
	});

	$("#category").change(function(){
		var id = $(this).val();
		$("#category3").hide();
		category.anObjectName = 'parent_'+id;
		if (category[category.anObjectName] !== undefined) {
			$("#category2").html("<option value=''>-silahkan pilih-</option>");					
			$.each( category[category.anObjectName], function( key, value ) {
				var option = "<option value='"+value.id+"'>"+value.name+"</option>";
				$("#category2").append(option);
			});

			$("#category2").show();
		}else {
			$("#category2").hide();
		}
	});

	$("#category2").change(function(){
		var id = $(this).val();
		category.anObjectName = 'parent_'+id;
		if (category[category.anObjectName] !== undefined) {
			$("#category3").html("<option value=''>-silahkan pilih-</option>");
			$.each( category[category.anObjectName], function( key, value ) {
				var option = "<option value='"+value.id+"'>"+value.name+"</option>";
				$("#category3").append(option);
			});

			$("#category3").show();
		}else {
			$("#category3").hide();
		}
	});

	$("#fileuploader").uploadFile({
		url: "image/mandiri",
		returnType:"json",
		formData: {_token: $("input[name=_token]").val() },
		showPreview:true,
		showProgress:true,
		showFileSize:false,
		showDelete:true,
		maxFileCount:5,
		previewHeight: "100px",
		previewWidth: "100px",
		fileName:"image",
		customProgressBar: function(obj, s)
        {
        	$("#addImage").html("");
        	console.log(obj.responses);
        	$.each( obj.responses, function( key, value ) {		        		
				$("#addImage").append("<input type='hidden' name='upload[]' value='"+value+"'>");
			});

            this.statusbar = $("<div style='float: left;' class='ajax-file-upload-statusbar'></div>");
            this.preview = $("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.statusbar).hide();
            this.filename = $("<div class='ajax-file-upload-filename'></div>").appendTo(this.statusbar);
            this.progressDiv = $("<div class='ajax-file-upload-progress'>").appendTo(this.statusbar).hide();
            this.progressbar = $("<div class='ajax-file-upload-bar'></div>").appendTo(this.progressDiv);
            this.abort = $("<div>" + s.abortStr + "</div>").appendTo(this.statusbar).hide();
            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
            this.del = $("<div>" + s.deleteStr + "</div>").appendTo(this.statusbar).hide();
            this.abort.addClass("ajax-file-upload-red");
            this.done.addClass("ajax-file-upload-green");
            this.download.addClass("ajax-file-upload-green");            
            this.cancel.addClass("ajax-file-upload-red");
            this.del.addClass("ajax-file-upload-red");
            
            return this;
        },
		onSuccess:function(files, data, xhr, pd)
		{
			$("#addImage").append("<input type='hidden' name='upload[]' value='"+data+"'>");
			$(".ajax-file-upload-filename").remove();
		},
		deleteCallback: function(data)
		{        				    
			$("#delImage").append("<input type='hidden' name='abort[]' value='"+data+"'>");
		}
	});

	$("#status").change(function() {
		var status = $(this).val();

		if(status == 1)
		{
			$("#stok").fadeIn( 600);
		}else
			{
				$("#stok").fadeOut( 600);
			}
	});    
	
	$(".input_grosir").keyup(function(){
		var id = parseInt($(this).data("id"));
		var type = $(this).data("type");
		var before_to = 1;
		var before_price = 0;
		var att_from = "#jumlah-ke-";
		var att_to = "#jumlah-sampai-";
		var att_price = "#harga-grosir-";
		var att_error = "#error-grosir-";
		var atr_grosir_angota = "#harga-grosir-angota-";
		var error_mark = "#delete-form-fill-";
		var message = "";
		var from = parseInt($(att_from+id).val());
		var to = parseInt($(att_to+id).val());
		var price = parseFloat($(att_price+id).val().replace(/\./g, ""));
		var error = 0;
		
		if(id !== 1)
		{
			var before_id = id - 1;
			before_to = parseInt($(att_to+before_id).val().replace(/\./g, ""));
			before_price = parseFloat($(att_price+before_id).val().replace(/\./g, ""));
		}

		if(isNaN(from) || isNaN(to)){
			error = 1;
			message = "<span style='color:red'> Input not valid </span>";
		}
		else if(from <= before_to){
			error = 1;
			message = "<span style='color:red'> Input not valid </span>";
		}
		else if(from > to){
			error = 1;
			message = "<span style='color:red'> Input not valid </span>";
		}
		else if((price >= before_price && id > 1) || price == 0){
			error = 1;
			message = "<span style='color:red'> Input not valid </span>";
		}

		var next = id + 1;
		if(error === 0 && price > 0 && id < 5)
		{			
			$(att_from+next).removeAttr("readonly");
			$(att_to+next).removeAttr("readonly");
			$(att_price+next).removeAttr("readonly");
		}else {			
			for (var i = next ; i < 6; i++) {
				$(att_from+i).attr("readonly", "readonly");
				$(att_to+i).attr("readonly", "readonly");
				$(att_price+i).attr("readonly", "readonly");

				$(att_from+i).val("");
				$(att_to+i).val("");
				$(att_price+i).val("");
				$(att_error+i).html("");
				$(atr_grosir_angota+i).html("");
				$(error_mark+i).hide();
			}
		}

		if(message !== "")
			$(error_mark+id).html("X");
		else 
			$(error_mark+id).html("Hapus");

		$(error_mark+id).show();

		$(att_error+id).html(message);
	});	
});