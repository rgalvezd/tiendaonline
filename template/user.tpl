{include file="template/header.tpl" title="encabezado"}
<div id="content">
    <br>
    <h2>{'user_list'}</h2>
    
    <p><a href="{$url}/user/add">{'new_user'}</a></p>
    <table>
        <tr>
            <th>Id</th>
            <th>{'name'}</th>
            <th>{'password'}</th>
            <th>{'role'}</th>
            <th>{'operations'}</th>
        </tr>
        
        {foreach $rows as $row}
            <tr>
                <td>{$row.id}</td>
                <td>{$row.nombre}</td>
                <td>{$row.password}</td>
                <td>{$row.role}</td>
                <td>
                    <a href="{$url}/user/edit/{$row.id}" >editar</a>
                    <a href="{$url}/user/delete/{$row.id}" >borrar</a>                    
                </td>
            </tr>
        {/foreach}
    </table>
    
    <p><a href="{$url}/user/add">{'new_user'}</a></p>

 </div>
{include file="template/footer.tpl" title="footer"}