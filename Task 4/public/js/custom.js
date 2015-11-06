$(document).ready(function(){
	//get request-om dobija podatke od REST servisa
	$.getJSON('service.php', function(json){
			var massages = json.data;
			for (var i = massages.length - 1; i >= 0; i--) {
				var content =  '<div id="'+massages[i].id+'" class="message">';
					content += '<div class="header">';
					content += 		'<span class="sender">'+massages[i].from.name+'</span>';
					content += 		'<span class="date">'+massages[i].date_sent_formatted.formatted+'</span>';
					content += '</div>';
					content += '<p class="subject">'+massages[i].subject+':</p>';
					content += '<p class="msg_content">'+massages[i].message_formatted+'</p>';
					content += '<div class="footer">';
					content += 		'<button id="'+massages[i].from.id+'" class="btn_rep" type="button">Reply</button>';
					content += 		'<button class="btn_del" type="button">Delete</button>';
					content += '</div>';
					content += '<div>';
				$('#wrapper').append(content);
			}
	});

	//klikom na dugme DELETE poziva se funkcija delete_messege
	$('#wrapper').on('click', '.btn_del', function() {
		var id = $(this).parent().parent().attr('id');
		delete_message(id);
	});

	//klikom na dugme REPLY poziva se funkcija replay_messege
	$('#wrapper').on('click', '.btn_rep', function() {
		var id = $(this).parent().parent().attr('id');
		var sender = $(this).attr('id');
		reply_message(id,sender);
	});
});

//u daljem razvoju iskoristiti DELETE iz servisa 
function delete_message(id){
	console.log('Delete message with id: '+id);
}

function reply_message(id, sender){
	console.log('Message id: '+id);
	console.log('Reply to: '+sender);
}