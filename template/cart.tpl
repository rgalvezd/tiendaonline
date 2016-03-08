{include file="template/header.tpl" title="encabezado"}
<div id="content"> 
    <br>
    <h2>Resumen de pedido</h2>
    
    {if $mode == 'cart'}
        <p><a href="{$url}pedido/add">Realizar pedido</a></p>
    {else}
        <p><a href="{$url}pedido">Volver</a></p>
    {/if}
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Unidades</th>
                <th>Precio</th>
                <th>Importe</th>
            </tr>
        </thead>
       
        <tbody>
            {foreach $rows as $row}
                <tr class="cell" id="row{$row.id}" idRow="{$row.id}" >
                    <td>{$row.id}</td>
                    <td>{$row.nombre}</td>
                    <td>{$row.unidades}</td>
                    <td>{$row.precio}</td>
                    <td class="importe">{{$row.unidades}*{$row.precio}}</td>
                </tr>
                
            {/foreach}
        </tbody>
    </table>
        
        <div id="importe"></div>    
    {if $mode == 'cart'}
        <p><a href="{$url}pedido/add">Realizar pedido</a></p>
    {else}
        <p><a href="{$url}pedido">Volver</a></p>
    {/if}
 </div>
{include file="template/footer.tpl" title="footer"}