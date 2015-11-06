// ajax, šalje podatke o trenutno iscrtanom kalendaru, vraća novi
$(document).ready(function(){     
	$.ajax({
		url: 'model.php',
		success: function(response){
			$('#calendar').append(response);
		}
	});                       

    $('.button').click(function(){
        var value = $(this).val();
        var month = $('#month-title').text();
        var year = $('#year-title').text();
        $.ajax({
        	url:"change.php",
        	data : {
        			'action' : value,
        			'month' : month,
        			'year' : year
        			},
        	success: function(response) { $('#calendar').html(response); } });
    });
});
