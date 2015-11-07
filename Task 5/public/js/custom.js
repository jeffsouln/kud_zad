$('#parser_form').submit(function(e){												        //ajax salje podatke iz forme, post
    		var data = $(this).serializeArray();
            var URL = $(this).attr('action');
            $.ajax({
                    url : URL,
                    type: "POST",
                    data : data,
                    success: function(response){
                        $('#result_wraper').empty();
                        var result = JSON.parse(response);									//parsira JSON rezultat			
                    	var table = $('<table></table>').attr('id', 'result_table');		//crta tabelu sa rezultatima
                    	table.append('<thead><th>Result: </th></thead>')	
         				for (var i = 0 ; i < result.length ; i++) {
         					table.append('<tr><td>' +  result[i] + '</td></tr>');
         					$('#result_wraper').append(table);
         				};
                    }
            });
           e.preventDefault();  															//omogucava ostanak na istoj strani
});