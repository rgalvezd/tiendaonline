{include file="template/header.tpl" title="encabezado"}
<div id="content">
    <br>
    <h2>Edición de usuarios</h2>
    
    <form action="{$url}/user/update" method="post">
        <input type="hidden" name="id" value="{$row.id}">
        <label>Nombre</label><input type="text" name="name" value="{$row.nombre}"><br>
        <label>Role</label>
        
        <select name="idRole" >
            {foreach $roles as $role}
            <option {($role.id==$row.idRole)? 'selected' : ''} 
                value="{$role.id}">
                {$role.role}
            </option>
            {/foreach}
        </select> 
        
        <br>


        
        <label>Password</label><input type="password" name="password"> 
        <span class="error">{$error.password}</span> <br>
        <label></label><input type="submit" value="Enviar">
    </form>

 </div>
{include file="template/footer.tpl" title="footer"}