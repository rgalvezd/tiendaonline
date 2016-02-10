//$(document).ready(function(){
//   $('#boton').click(function(){
//       var xmlhttp = new XMLHttpRequest();
//        var url = "http://localhost:82/ProyectoTema7/public/resources/mParrafo.txt";
//
//        xmlhttp.onreadystatechange = function() {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                var myArr = xmlhttp.responseText;
//                myArr = myArr ? myArr : '';
//                mFunction(myArr);
//            }
//        };
//        xmlhttp.open("GET", url, true);
//        xmlhttp.send();
//
//        function mFunction(arr) {
//           document.getElementById("content").innerHTML += '<div>' + (arr ? arr : 'vacio') + '</div>';
//        }
//   });
//});

$(document).ready(function(){
   $('#boton').click(function(){
               $.get("http://localhost:82/ProyectoTema7/es/study/ajaxPrueba",
                       function(arr) {
                           document.getElementById("content").innerHTML += '<div>' + (arr ? arr : 'vacio') + '</div>';
                       });
        
   });
   
   $('#nivel').change(function(){
      var opt = $('#nivel').val();
      if (opt == 0){
        $('#estudio').find('option').remove();
        $('#estudio').prop("disabled", true);
      }else{
           $.get("http://localhost:82/ProyectoTema7/es/study/ajaxPrueba",
                function(arr) {
                    $("#content").append('<div>' + (arr ? arr : 'vacio') + '</div>');
            });
      }
   });
});