var mtc = 0;
var theaters;
function addShowtime(){
	var newShowtime = '<div id="showtime_container-'+mtc+'"><div class="input text">';
	newShowtime += '<label for="MovieShowtimeSala">Sala</label>';
	newShowtime += '<input name="data[Showtimes]['+mtc+'][sala]" maxlength="45" type="text" id="MovieShowtimeSala'+mtc+'"/>';
	newShowtime += '</div><div class="input text"><label for="MovieShowtimeHora">Hora</label>';
	newShowtime += '<input name="data[Showtimes]['+mtc+'][hora]" maxlength="100" type="text" id="MovieShowtimeHora'+mtc+'"/>';
	newShowtime += '</div><div class="input text"><label for="MovieShowtimeIdioma">Idioma</label>';
	newShowtime += '<input name="data[Showtimes]['+mtc+'][idioma]" maxlength="45" type="text" id="MovieShowtimeIdioma'+mtc+'"/>';
	newShowtime += '</div><div class="input text"><label for="MovieShowtimeDia">Dia</label>';
	newShowtime += '<input name="data[Showtimes]['+mtc+'][dia]" maxlength="100" type="text" id="MovieShowtimeDia'+mtc+'"/>';
	newShowtime += '</div><div class="input select required"><label for="MovieShowtimeMovieTheatersId">Cine</label>';
	newShowtime += '<select name="data[Showtimes]['+mtc+'][movie_theaters_id]" id="MovieShowtimeMovieTheatersId'+mtc+'">';
	$.each( theaters, function( key, value ) {
		newShowtime += '<option value="'+value.MovieTheater.id+'">'+value.MovieTheater.name+'</option>';
	});
	newShowtime += '</select></div>';
	newShowtime += '<a onclick="removeShowtime(this);" style="vertical-align: bottom; padding-left: 10px;"';
	newShowtime += ' href="#!"><img style="width: 40px;" alt="Remover Telefono" src="/img/style/minus-button-md.png"></a></div>';
	var html = newShowtime;
	$('#showtime-container').append(html);
	mtc++;
	return false;
}
function removeShowtime(showtime){
	var id = $(showtime).parent().attr('id').split("-");
	$(showtime).parent().remove();
	$("#showtime-container").children().each(function(i, object){
		if(i >= id[1]){
			$(object).attr('id','showtime_container-'+i);
			$('#MovieShowtimeSala'+(i+1)).attr('id','MovieShowtimeSala'+i);
			$('#MovieShowtimeSala'+(i)).attr('name','data[Showtimes]['+i+'][sala]');
			$('#MovieShowtimeHora'+(i+1)).attr('id','MovieShowtimeHora'+i);
			$('#MovieShowtimeHora'+(i)).attr('name','data[Showtimes]['+i+'][hora]');
			$('#MovieShowtimeIdioma'+(i+1)).attr('id','MovieShowtimeIdioma'+i);
			$('#MovieShowtimeIdioma'+(i)).attr('name','data[Showtimes]['+i+'][idioma]');
			$('#MovieShowtimeDia'+(i+1)).attr('id','MovieShowtimeDia'+i);
			$('#MovieShowtimeDia'+(i)).attr('name','data[Showtimes]['+i+'][dia]');
			$('#MovieShowtimeMovieTheatersId'+(i+1)).attr('id','MovieShowtimeMovieTheatersId'+i);
			$('#MovieShowtimeMovieTheatersId'+(i)).attr('name','data[Showtimes]['+i+'][movie_theaters_id]');
		}
	}); 
	
	mtc--;
}
function setmtc(){
	$("#showtime-container").children().each(function(i, object){
		mtc++;
	}); 
}
function getMovieTheaters(){
	$.ajax({
		async : false,
        type: 'POST',
        url: "/movieTheaters/index.json",
        dataType: "json",
        success : function (data) {
        	theaters = data;
        }
	});
}
$(document).ready(function() {
	setmtc();
	getMovieTheaters();
//	$('#business_table').dataTable();
});