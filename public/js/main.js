var pag = 1;
var role = "";
var numPages = 0;
var reload = false;
var last = false;

function filterItems(text){
    if(text == ""){
        getPage();
    }else{
        $.post('http://localhost/tiendaonline/producto/filter', {filter: text}, function(data){
            $('#productos').empty();
            var str = ""; 
            if(data != ""){
                
                for(var k = 0; k < data.length; k++){ 
                    var id = data[k].id;
                    str += '<tr>'
                    str += '<td><input id="id'+id+'"disabled type="text" class="center" value="'+data[k].id+'" size=2></td>';
                    str += '<td><input id="codigo'+id+'" type="text" class="editable" value="'+data[k].codigo+'"></td>';
                    str += '<td><input id="nombre'+id+'" type="text" class="editable" value="'+data[k].nombre+'"></td>';
                    str += '<td><input id="precio'+id+'" type="text" class="editable center" value="'+data[k].precio+'" size=2></td>';
                    str += '<td><input id="existencia'+id+'" type="text"  class="editable center" value="'+data[k].existencia+'" size=2></td>';
                    if(role == "2"){
                        str += '<td><input id="unidades'+id+'" class="center" type="number" min=1 max='+data[k].existencia+' value=1 size=3><button onclick="buyItem('+id+');" class="buy">Comprar</button>';
                    }
                    if(role == "3"){
                       str += '<td><button onclick="deleteItem('+id+');" class="borrar">Borrar</button><button onclick="editItem('+id+');" class="editar">Editar</button></td>';
                    }
                    str += '</tr>';
                }
                $('#productos').append(str); 

                if(role != "3"){
                    $('.editable').attr('disabled',true);
                }

                if(pag == 0){
                    $('#back').hide();
                }else{
                    $('#back').show();
                }
                if(pag == numPages-1){
                    $('#next').hide();
                }else{
                    $('#next').show();
                }
                $('.pActive').removeClass("pActive");
                $('#p'+pag).addClass("pActive")

            }
        }, 'json');
    }
};

function buyItem(k){
    var data = JSON.stringify([{'id': $("#id"+k).val(), 'nombre':$("#nombre"+k).val(), 'unidades':$("#unidades"+k).val(),'precio':$("#precio"+k).val() }]);
    $.post('http://localhost/tiendaonline/producto/buy', 'data='+data, function (data){
       // alert("Producto añadido al carrito");
       alert(data);
    });
    $("#unidades"+k).val(1);
}

function deleteItem(k){
    $.post('http://localhost/tiendaonline/producto/delete', 'id=' + k, function (data){
        reload = true;    
        getNumPages();
    });
};

function editItem(k){
    $.post('http://localhost/tiendaonline/producto/edit', {'id': $("#id"+k).val(), 'codigo' : $("#codigo"+k).val() , 
                'nombre' : $("#nombre"+k).val(), 'precio' : $("#precio"+k).val(), 'existencia' : $("#existencia"+k).val()}, function (data){
         getPages();
    }); 
};
function newItem(){
    if ( $("#nombreNuevo").val() == '' || $("#precioNuevo").val() == '' || $("#existenciaNuevo").val() == ''){
        alert('Se deben de rellenar todos los campos para añadir un producto.')
    } else{
        $.post('http://localhost/tiendaonline/producto/add', {'codigo' : $("#codigoNuevo").val() , 
                    'nombre' : $("#nombreNuevo").val(), 'precio' : $("#precioNuevo").val(), 'existencia' : $("#existenciaNuevo").val()}, function (data){   
            reload = true;
            last = true;
            getNumPages();
       }); 
    }
       $('#codigoNuevo').val('');
       $('#nombreNuevo').val('');
       $('#precioNuevo').val('');
       $('#existenciaNuevo').val('');
};

function getPage(){   
    $.post('http://localhost/tiendaonline/producto/getPage', 'page=' + pag, function (data) {
        
//        alert(pag);
        var str = ""; 
        if(data != ""){
            
            $('#productos').empty();
            for(var k = 0; k < data.length; k++){ 
                var id = data[k].id;
                str += '<tr>'
                str += '<td><input id="id'+id+'"disabled type="text" class="center" value="'+data[k].id+'" size=2></td>';
                str += '<td><input id="codigo'+id+'" type="text" class="editable" value="'+data[k].codigo+'"></td>';
                str += '<td><input id="nombre'+id+'" type="text" class="editable" value="'+data[k].nombre+'"></td>';
                str += '<td><input id="precio'+id+'" type="text" class="editable center" value="'+data[k].precio+'" size=2></td>';
                str += '<td><input id="existencia'+id+'" type="text"  class="editable center" value="'+data[k].existencia+'" size=2></td>';
                if(role == "2"){
                    str += '<td><input id="unidades'+id+'" class="center" type="number" min=1 max='+data[k].existencia+' value=1 size=3><button onclick="buyItem('+id+');" class="buy">Comprar</button>';
                }
                if(role == "3"){
                   str += '<td><button onclick="deleteItem('+id+');" class="borrar">Borrar</button><button onclick="editItem('+id+');" class="editar">Editar</button></td>';
                }
                str += '</tr>';
            }
            $('#productos').append(str); 
            
            if(role != "3"){
                $('.editable').attr('disabled',true);
            }
            
            if(pag == 0){
                $('#back').hide();
            }else{
                $('#back').show();
            }
            if(pag == numPages-1){
                $('#next').hide();
            }else{
                $('#next').show();
            }
            $('.pActive').removeClass("pActive");
            $('#p'+pag).addClass("pActive")
        }else{
            pag --;
        }
    },'json');
};

function getNumPages(){
    $.post('http://localhost/tiendaonline/producto/getNumPages', function (data) {
        var num = data[0].numPages;
        if(num != numPages){
            numPages = num;
            str = '<button id="back" class="pages"><-</button>';
            $('#pages').empty();
            for(var k = 0; k < numPages; k++){
                str += '<button id="p' + k + '" class="pages">' + (k+1) +'</button>';
            }
            str += '<button id="next" class="pages">-></button>';
            $('#pages').append(str);
            
            $("#next").click(function(){
                pag++;
                getPage();
            });
            $("#back").click(function(){
                pag--;
                if(pag < 0 ){
                    pag = 0;
                }else if(pag >= numPages){
                    pag = numPages-1;
                }else{
                    getPage();    
                }        
            });
             for(var k = 0; k < numPages; k++){
                $('#p'+k).click(function(){
                  pag = $(this).html() - 1;
                  getPage();
                });
            }
            
        }
        if(reload){
                reload = false;
                if(last || pag >= numPages){
                   last = false;
                   pag = numPages - 1;
                }
                getPage();
            }
    }, 'json');
}

$(document).ready(function () {
    $("#filter").keyup(function () {
        filterItems($(this).val());
    });
    
    role = $('table').attr("roleUser").toString();
    getNumPages();
    getPage();
   
});