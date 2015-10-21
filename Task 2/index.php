<?php
    require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Task Two</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="public/css/style.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="public/js/jquery.js" type="text/javascript"></script>
        <script src="public/js/custom.js" type="text/javascript"></script>
    </head>
    <body>
        <div id='calendar'>
            <?php
                $calenadar = Kalendar::getInstance();
                $calenadar->render();
            ?>
        </div>
        <div id='buttons'>
            <input type="button" class="button" name="privious" value="Predhodni mesec">
            <input type="button" class="button" name="next" value="Sledeći mesec">
        </div>

    <script>
        $(document).ready(function(){                            // ajax, šalje podatke o trenutno iscrtanom kalendaru, vraća novi
            $('.button').click(function(){
                var value = $(this).val();
                var month = $('#month-title').text();
                var year = $('#year-title').text();
                $.ajax({url:"change.php", data : {'action' : value, 'month' : month, 'year' : year}, success: function(response) { $('#calendar').html(response); } });
            });
        });
    </script>

    </body>

</html>
