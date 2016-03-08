 $(document).ready( function(){
        var importe = 0;
        $('.importe').each(function(){
            //alert($(this).html());
            importe += +$(this).html();
        });
        $('#importe').html('Importe total: '+importe+ ' €');
 });