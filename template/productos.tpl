{include file="template/header.tpl" title="encabezado"}
<div id="content"> 
    <br>
    <h2>Lista de productos</h2>
    <p><label>Filtrado por nombre: </label><input id="filter"></p>
    <table roleUser="{$role}">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencias</th>
                {if $role > 1}
                    <th></th>
                {/if}
            </tr>
        </thead>
        {if $role == 3}
            <tfoot>
                <td></td>
                <td><input id="codigoNuevo" value="" placeholder="Codigo"></input></td>
                <td><input id="nombreNuevo" value="" placeholder="Nombre"></input></td>
                <td><input id="precioNuevo" value="" placeholder="Precio"></input></td>
                <td><input id="existenciaNuevo" value="" placeholder="Existencias"></input></td>
                <td><button onclick="newItem();" id="nuevoProducto">Añadir</button></td>
            </tfoot>
        {/if}
        <tbody id="productos"><td>hola probando</td></tbody>
    </table>
    
    
    <div id="pages"></div>
    
  
 </div>
{include file="template/footer.tpl" title="footer"}