$(document).ready(function(){
            //nakon ucitavanja strane ajax poziva model.php, i iscrtava formu
            $.ajax({                                                                                                        
                url: 'model.php',
                success: function(response){
                    var formData = JSON.parse(response);
                    for (var i = 0; i < formData.length; i++) {
                        $('#row_'+i).append('<p>Delivery Method '+i+'</p>');
                        $('#row_'+i).addClass(formData[i].delivery_method_id);
                        if (formData[i].range_set == '1') {
                            $('#row_'+i).addClass('has_ranges');
                            var content = '<a class="show_ranges"  href="#" ><p class="link">Show Ranges</p></a>';
                            $('#row_'+i).append(content);
                        } else {
                            $('#row_'+i).addClass('no_ranges');
                            var content  = '<input class="price" type="number" name="del_meth['+formData[i].delivery_method_id+'][fixed_price]" value="'+ formData[i].fixed_price+'">';
                                content += '<p class="dollar_price">$</p>';
                            $('#row_'+i).append(content);
                        }
                        content  = '<input class="'+formData[i].delivery_method_id+'" type="hidden" value="'+formData[i].delivery_method_id+'">'
                        $('#row_'+i).append(content);
                    }
                }
            });
            
            //klikom na link "show_ranges", ajax poziva get_ranges.php, salje id delivery methode i u ovkiru njenog diva renderuje dovove sa podatcima "ranges"
            $('form').on('click', 'a.show_ranges', function(){
                $('div.range').remove();
                var id = $(this).parent().attr('class').split(' ')[0];
                $.ajax({
                    url: 'get_ranges.php',
                    data: {'delivery_method_id' : id},
                    success: function(response){
                        var ranges = JSON.parse(response);
                        for (var i = 0; i < ranges.length; i++) {
                            var content  = '<div class="range '+ranges[i].range_id+'">';
                                content += '<p class="range">From</p>';
                                content += '<input class="range" name="del_meth['+id+'][range]['+ranges[i].range_id+'][from]" type="number" value="'+ranges[i].from+'">';
                                content += '<p class="dollar_range">$</p><p class="range">to</p>';
                                content += '<input class="range"  name="del_meth['+id+'][range]['+ranges[i].range_id+'][to]" type="number" value="'+ranges[i].to+'">';
                                content += '<p class="dollar_range">$</p>';
                                content += '<input class="range_price"  name="del_meth['+id+'][range]['+ranges[i].range_id+'][price]" type="number" value="'+ranges[i].price+'">';
                                content += '<p class="dollar_range">$</p>';
                                content += '<a class="delete_range" href="#" >';
                                content += '<p class="add_delete link">Delete</p>';
                                content += '</a>';
                                content += '<a class="add_new_range" href="#" >';
                                content += '<p class="add_delete link">Add new</p>';
                                content += '</a>';
                                content += '</div>';
                            $('input.'+id).after(content);
                        };
                    }
                });
            });
            
            //klikom na link "btn_options", ajax poziva get_options.php, salje id delivery methode i u ovkiru njenog diva renderuje dovove sa podatcima "options"
            $('form').on('click', '.btn_options', function(){
                var id = $(this).parent().attr('class').split(' ')[0];
                $(".options", $(this).parent()).remove();
                $.ajax({
                    url: 'get_options.php',
                    data: {'delivery_method_id' : id},
                    success: function(response){
                        var options = JSON.parse(response);
                        var content  = '<div class="options">';
                            content += '<p>Delivery URL</p>';
                            content += '<input class="url" name="del_meth['+id+'][url]" type="url" value="'+options.delivery_url+'">';
                            content += '<p class="weight">Weight (accepted deliveries in KG)</p>';
                            content += '<p class="range">From</p>';
                            content += '<input class="range" name="del_meth['+id+'][w_from]" type="number" value="'+options.w_from+'">';
                            content += '<p class="range">To</p>';
                            content += '<input class="range" name="del_meth['+id+'][w_to]" type="number" value="'+options.w_to+'">';
                            content += '<p class="dollar_range">KG</p>';
                            content += '<p>Notes</p>';
                            content +=  '<textarea class="notes" name="del_meth['+id+'][notes] ">'+options.notes+'</textarea>';
                            content += '</div>';
                        $('input.'+id).after(content);
                    }
                });

            });
            
            //klikom na link "delete_range", ajax poziva delete_range.php, salje id delivery methode uklanja rekord iz baze, zatim brise div sa interfejsa
            $('form').on('click', 'a.delete_range', function(){
                var div = $(this).parent().parent();
                var id = div.attr('class').split(' ')[0];
                var range_id = $(this).parent().attr('class').split(' ')[1];
                if ($(this).parent().siblings().hasClass('range')) {
                    $.ajax({
                        url: 'delete_range.php',
                        data: {'id' : range_id}
                    });
                } else {
                    $.ajax({
                        url: 'delete_range.php',
                        data: {'id' : range_id,
                               'del_met_id' : id 
                              }
                    });
                    $('.show_ranges', div).remove();
                    div.append('<input class="price" type="number" name="del_meth['+id+'][fixed_price]" value="">');
                    div.append('<p class="dollar_price">$</p>');
                    div.addClass('no_ranges').removeClass('has_ranges');
                }
                
                $(this).parent().remove();
                $('.btn_options').remove();
            });

            //klikom na link "add_new_range", iscrtava se u oviru diva novi sa klasom "range" i inputima za unos novog range u bazu
            $('form').on('click', 'a.add_new_range', function(){
                var div = $(this).parent().parent();
                var id = div.attr('class').split(' ')[0];
                var token = Math.random();
                var content  = '<div class="range">';
                    content += '<p class="range">From</p>';
                    content += '<input class="range" name="del_meth['+id+'][range][new_range_'+token+'][from] type="number" value="">';
                    content += '<p class="dollar_range">$</p>';
                    content += '<p class="range">to</p>';
                    content += '<input class="range" name="del_meth['+id+'][range][new_range_'+token+'][to] type="number" value="">';
                    content += '<p class="dollar_range">$</p>';
                    content += '<input class="range_price" name="del_meth['+id+'][range][new_range_'+token+'][price] type="number" value="">';
                    content += '<p class="dollar_range">$</p>';
                    content += '<a class="delete_range" href="#" >';
                    content += '<p class="add_delete link">Delete</p>';
                    content += '</a>';
                    content += '<a class="add_new_range"  href="#" >';
                    content += '<p class="add_delete link">Add new</p>';
                    content += '</a>';
                    content += '</div>';
                $(this).parent().after(content);
            });

            //na ulazak misa iznad diva sa klasom "no_ranges" iscrtava se link add_ranges i dugme btn_options, izlaskom misa iz polja diva link i dugme nestaju 
            $('form').on('mouseenter', '.no_ranges', function(){
                var content  = '<a class="add_ranges"  href="#" >';
                    content += '<p class="link">Add ranges</p>';
                    content += '</a>';
                    content += '<input class="btn_options" type="button" value="Show options">';
                $('.dollar_price', this).after(content);
            }).on('mouseleave', '.no_ranges', function(){
                $('a.add_ranges').remove();
                $('.btn_options').remove();
            });

            //na ulazak misa iznad diva sa klasom "has_ranges" iscrtava se dugme btn_options, izlaskom misa iz polja diva dugme nestaje 
            $('form').on('mouseenter', '.has_ranges', function(){
                $('.show_ranges',this).after('<input class="btn_options" type="button" value="Show options">');
            }).on('mouseleave', '.has_ranges', function(){
                $('.btn_options').remove();
            });

            //klikom na link "add_ranges" iscrtava se u oviru diva novi sa klasom "range" i inputima za unos novog range u bazu i menjaju se klase roditeljskog diva u "has_ranges"
            $('form').on('click', '.add_ranges', function(){
                $('.price', $(this).parent()).remove();
                $('.dollar_price', $(this).parent()).remove();
                var div = $(this).parent();
                var id = div.attr('class').split(' ')[0];
                var token = Math.random();
                var content  = '<div class="range">';
                    content += '<p class="range">From</p>';
                    content += '<input class="range" name="del_meth['+id+'][range][new_range_'+token+'][from] type="number" value="">';
                    content += '<p class="dollar_range">$</p>';
                    content += '<p class="range">to</p>';
                    content += '<input class="range" name="del_meth['+id+'][range][new_range_'+token+'][to] type="number" value="">';
                    content += '<p class="dollar_range">$</p>';
                    content += '<input class="range_price" name="del_meth['+id+'][range][new_range_'+token+'][price] type="number" value="">';
                    content += '<p class="dollar_range">$</p>';
                    content += '<a class="delete_range" href="#" >';
                    content += '<p class="add_delete link">Delete</p>';
                    content += '</a>';
                    content += '<a class="add_new_range"  href="#" >';
                    content += '<p class="add_delete link">Add new</p>';
                    content += '</a>';
                    content += '</div>';
                div.append(content);
                $(this).parent().addClass('has_ranges').removeClass('no_ranges');
                $(this).remove();
            });
            
            //submit trigeruje ajax koji salje podatke za unos u bazu
            $("#form").submit(function(e){
                var data = $(this).serializeArray();
                $.ajax({
                    url: "process.php",
                    type: "POST",
                    data: data,
                    success: function(){
                        $('#wrapper').append('<div id="result">Form is successfully updated!</div>');
                    }
                });
            e.preventDefault();  //sprecava odlazak na process.php
            });
                

        });
           
         