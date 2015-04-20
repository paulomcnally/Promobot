function getBusinessInfo(){
	var action = $('#BusinessFacebook').val();
	
	if(action == '') return;
	
	if(confirm('Taer la info de facebook?')){
		var address = $('#BusinessFacebook').val();
		address = address.split("facebook.com/");
		address = "https://graph.facebook.com/"+address[1];
		$.ajax({
	        async : false,
	        type: 'GET',
	        url: address,
	        dataType: "json",
	        success : function (r) {
	            $('#BusinessName').val(r.name);
	            $('#BusinessDescripcion').val(r.description);
	            $('#BusinessPhone').val(r.phone);
	            $('#BusinessWeb').val(r.website);
	            $('#BusinessFacebookId').val(r.id);
	            $('#BusinessFacebookInfo').val(JSON.stringify(r));
	            
	            if(r.location != null){
	            	var detailNumber = addBusinessDetail();
	            	$('#BusinessDetailDireccion'+detailNumber).val(r.location.street);
	            	$('#BusinessDetailLat'+detailNumber).val(r.location.latitude);
	            	$('#BusinessDetailLong'+detailNumber).val(r.location.longitude);
	            	$('#BusinessDetailDireccion'+detailNumber).attr('value',r.location.street);
	            	$('#BusinessDetailLat'+detailNumber).attr('value',r.location.latitude);
	            	$('#BusinessDetailLong'+detailNumber).attr('value',r.location.longitude);
	            	$('#BusinessDetailCitiesId'+detailNumber+' option:contains("'+r.location.city+'")').attr('selected', true);
	            }
	        }
	    });
	}
}

