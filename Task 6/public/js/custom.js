$(document).ready(function(){

	$('#news_letter_form').submit(function(e){      //AJAX salje adresu i sadrzaj maila na add.php POST metodom
	   var data = $(this).serializeArray();
	   var URL = $(this).attr('action');
	   $.ajax({
	           url : URL,
	           type: "POST",
	           data : data,
	           success: function(){
	              $('#news_letter_form')[0].reset();     //resetuje formu
	               $('#message').text('Your email is saved!');
	           }
	    });
	e.preventDefault();  //sprecava odlazak na add.php
	});
	
	$('#btn_send_all').click(function(){
	    $.ajax({
	        url: 'send.php',
	        success: function(){
	            $('#message').text('All Your emails are sent!');
	        }
	    });
	});	
});