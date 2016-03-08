{include file="template/header.tpl" title="encabezado"}
<div id="content"> 
    <br>
    <h2>Lista de pedidos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de pedido</th>
                <th>Fecha de Servido</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th></th>               
            </tr>
        </thead>
       
        <tbody>
            {foreach $rows as $row}
                <tr class="cell" id="row{$row.id}" idRow="{$row.id}" >
                    <td>{$row.id}</td>
                    <td>{$row.fechaPedido}</td>
                    <td>{$row.fechaServido}</td>
                    <td>{$row.estado}</td>
                    <td>{$row.nombre}</td>
                    <td><a href="{$url}pedido/detail/{$row.id}">Detalles</a>
                </tr>
            {/foreach}
        </tbody>
    </table>
    
  
 </div>
{include file="template/footer.tpl" title="footer"}