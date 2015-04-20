function addPhoneNumber(detail){
	var phoneCounter = $("#phone-container-"+detail+" > div").length;

	var newPhone = '<div class="input text" id="phone-'+detail+'-'+phoneCounter+'"><label for="BusinessDetailTelefono">Telefono</label>';
	newPhone += '<input type="text" id="BusinessDetailTelefono-'+detail+'-'+phoneCounter+'" maxlength="45" onblur="setHtmlChanges(this);" style="width: 90%" ';
	newPhone += 'name="data[BusinessDetail]['+detail+'][PhoneNumber]['+phoneCounter+'][phone_number]"><a class="RemovePhone-'+detail+'" onclick="removePhoneNumber('+detail+',this);" style="vertical-align: bottom; padding-left: 10px;"';
	newPhone += ' href="#/"><img style="width: 40px;" alt="Remover Telefono" src="/img/style/minus-button-md.png"></a></div>';
	var html = $('#phone-container-'+detail).html();
	html = html + newPhone;
	$('#phone-container-'+detail).html(html);
}
function deletePhoneNumber(id,phone,detail){
	if(!confirm("Seguro que desea borrar?")) return;
	$.ajax({
        async : false,
        type: 'POST',
        url: "/businessDetails/deletePhone.json",
        data : {
            "id" : id
        },
        dataType: "json",
        success : function (r) {
        	if(r)
        		removePhoneNumber(detail,phone);
        	else
        		alert("Error al borrar el telefono");
        }
    });
}
function deleteBusinessImage(id,object){
	if(!confirm("Seguro que desea borrar?")) return;
	$.ajax({
        async : false,
        type: 'POST',
        url: "/businesses/deleteImage.json",
        data : {
            "id" : id
        },
        dataType: "json",
        success : function (r) {
        	if(r){
        		$(object).parent().remove();
        	}else
        		alert("Error al borrar la imagen");
        }
    });
}
function removePhoneNumber(detail,phone){
	var id = $(phone).parent().attr('id').split("-");
	$(phone).parent().remove();
	$("#phone-container-"+detail).children().each(function(i, object){
		if(i >= id[2]){
			$(object).attr('id','phone-'+detail+'-'+i);
			$('#BusinessDetailTelefono-'+detail+'-'+(i+1)).attr('id','BusinessDetailTelefono-'+detail+'-'+i);
			$('#BusinessDetailTelefono-'+detail+'-'+(i)).attr('name','data[BusinessDetail]['+detail+'][PhoneNumber]['+i+'][phone_number]');
		}
	});
}
var imageCounter = 0;
function addBusinessImage(){
	var newImage = '<div class="input file" id="BusinessImage-'+imageCounter+'"><label for="BusinessImage">Image</label>';
	newImage += '<input type="file" id="image-'+imageCounter+'" lable="Imagen" name="data[Image]['+imageCounter+'][name]">';
	newImage += '<a onclick="removeBusinessImage(this);" style="vertical-align: bottom; padding-left: 10px;"';
	newImage += ' href="#/"><img style="width: 40px;" alt="Remover Imagen" src="/img/style/minus-button-md.png"></a></div>';

	var html = $('#image-container').html();
	html = html + newImage;
	$('#image-container').html(html);
	imageCounter++;

	return imageCounter - 1;
}
function removeBusinessImage(image){
	var id = $(image).parent().attr('id').split("-");
	$(image).parent().remove();
	$("#image-container").children().each(function(i, object){
		if(i >= id[1]){
			$(object).attr('id','BusinessImage-'+i);
			$('#image-'+(i+1)).attr('id','image-'+i);
			$('#image-'+(i)).attr('name','data[Image]['+i+'][name]');
		}
	});

	imageCounter--;
}
var detailCounter = 0;
function addBusinessDetail(){
	setDetailCounter();

	var newDetail = '<div class="input text" id="detail-'+detailCounter+'"><label for="BusinessDetail">Detalle</label>';
	newDetail += '<div class="input text"><label for="BusinessDetailDireccion">Direccion</label>';
	newDetail += '<input name="data[BusinessDetail]['+detailCounter+'][direccion]" onblur="setHtmlChanges(this);" maxlength="100" id="BusinessDetailDireccion'+detailCounter+'" type="text"></div>';
	newDetail += 'Agregar Telefono: <a href="#/" style="vertical-align: bottom; padding-left: 10px;" id="AddPhone-'+detailCounter+'" onclick="addPhoneNumber('+detailCounter+');">';
	newDetail += '<img src="/img/style/add-button-md.png" alt="Agegar Telefono" style="width: 40px;"></a>';
	newDetail += '<div id="phone-container-'+detailCounter+'"></div>';
	newDetail += '<div class="input number"><label for="BusinessDetailLat">Lat</label><input name="data[BusinessDetail]['+detailCounter+'][lat]"';
	newDetail += 'step="any" onblur="setHtmlChanges(this);" id="BusinessDetailLat'+detailCounter+'" type="number"></div><div class="input number"><label for="BusinessDetailLong">';
	newDetail += 'Long</label><input name="data[BusinessDetail]['+detailCounter+'][long]" step="any" onblur="setHtmlChanges(this);" id="BusinessDetailLong'+detailCounter+'" type="number"></div>';
	newDetail += '<div class="input select required"><label for="BusinessDetailCitiesId">Ciudad</label>'+getCities()+'</div>';
	newDetail += '<a onclick="removeBusinessDetail(this);" style="vertical-align: bottom; padding-left: 10px;"';
	newDetail += ' href="#/"><img style="width: 40px;" alt="Remover Detalle" src="/img/style/minus-button-md.png"></a></div>';
	//var html = $('#detail-container').html();
	//html = html + newDetail;
	$('#detail-container').append(newDetail);
	detailCounter++;

	return detailCounter - 1;
}
function removeBusinessDetail(detail){
	var id = $(detail).parent().attr('id').split("-");
	$(detail).parent().remove();
	$("#detail-container").children().each(function(i, object){
		if(i >= id[1]){
			$(object).attr('id','detail-'+i);
			$('#BusinessDetail'+(i+1)).attr('id','BusinessDetail'+i);
			$('#BusinessDetailDireccion'+(i+1)).attr('id','BusinessDetailDireccion'+i);
			$('#BusinessDetailDireccion'+(i)).attr('name','data[BusinessDetail]['+i+'][direccion]');
			$('#BusinessDetailLat'+(i+1)).attr('id','BusinessDetailLat'+i);
			$('#BusinessDetailLat'+(i)).attr('name','data[BusinessDetail]['+i+'][lat]');
			$('#BusinessDetailLong'+(i+1)).attr('id','BusinessDetailLong'+i);
			$('#BusinessDetailLong'+(i)).attr('name','data[BusinessDetail]['+i+'][long]');
			$('#BusinessDetailCitiesId'+(i+1)).attr('id','BusinessDetailCitiesId'+i);
			$('#BusinessDetailCitiesId'+(i)).attr('name','data[BusinessDetail]['+i+'][cities_id]');
			$('#phone-container-'+(i+1)).attr('id','phone-container-'+i);
			$('#AddPhone-'+(i+1)).attr('id','AddPhone-'+i);
			$('#AddPhone-'+(i)).attr('onclick','addPhoneNumber('+i+')');

			$("#phone-container-"+i).children().each(function(p, phone){
				$('#phone-'+(i+1)+'-'+p).attr('id','phone-'+(i)+'-'+p);
				$('#BusinessDetailTelefono-'+(i+1)+'-'+p).attr('id','#BusinessDetailTelefono-'+(i)+'-'+p);
				$('#BusinessDetailTelefono-'+(i)+'-'+p).attr('name','data[BusinessDetail]['+i+'][PhoneNumber]['+p+'][phone_number]');
			});
			$(".RemovePhone-"+(i+1)).addClass('RemovePhone-'+(i));
			$(".RemovePhone-"+(i+1)).removeClass('RemovePhone-'+(i+1));
			$(".RemovePhone-"+(i)).attr('onclick','removePhoneNumber('+i+',this)');
		}
	});

	detailCounter--;
}
function deleteBusinessDetail(id,detail){
	if(!confirm("Seguro que desea borrar?")) return;
	$.ajax({
        async : false,
        type: 'POST',
        url: "/businessDetails/delete.json",
        data : {
            "id" : id
        },
        dataType: "json",
        success : function (r) {
        	if(r)
        		removeBusinessDetail(detail);
        	else
        		alert("Error al borrar el detalle");
        }
    });
}
function setDetailCounter(){
	$("#detail-container").children().each(function(i, object){
		detailCounter++;
	});
}
function getCities(){
	var cities = '<select name="data[BusinessDetail]['+detailCounter+'][cities_id]" id="BusinessDetailCitiesId'+detailCounter+'">';
	cities += '<option value="1">Managua</option>';
	cities += '<option value="2">Granada</option>';
	cities += '<option value="3">Masaya</option>';
	cities += '<option value="4">Le�n</option>';
	cities += '<option value="5">Chinandega</option>';
	cities += '<option value="6">Rivas</option>';
	cities += '<option value="7">Estel�</option>';
	cities += '<option value="8">Matagalpa</option>';
	cities += '<option value="9">Boaco</option>';
	cities += '<option value="10">Chontales</option>';
	cities += '<option value="11">Jinotega</option>';
	cities += '<option value="12">Madriz</option>';
	cities += '<option value="13">Nueva Segovia</option>';
	cities += '<option value="14">Carazo</option>';
	cities += '<option value="15">Rio San Juan</option>';
	cities += '<option value="16">R.A.A.N</option>';
	cities += '<option value="17">R.A.A.S</option>';
	cities += '</select>';

	return cities;
}
function setHtmlChanges(object){
	$(object).attr('value',$(object).val());
}

/*jQuery(document).ready(function ($) { //fire on DOM ready
    $('img.catimg').click(function() {
        alert( "Handler for .click() called." );
    });

    // Start binding events here...    
        var nselect = $("<select id = \"BusinessCategory\" style = \"height: 350px;\" multiple = \"multiple\" name = \"data[Business][Category][]\"></select>"
);

nselect.appendTo(".selectcat");
        
});*/



