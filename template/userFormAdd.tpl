{include file="template/header.tpl" title="encabezado"}
<div id="content">
    <br>
    <h2>Registro de usuario</h2>
    
    <form action="{$url}/user/insert" method="post">
        <label>Nombre</label><input type="text" name="name"><br>
        
        {if $role == 3}
        <label>Role</label>
       
        <select name="idRole" >
            <option selected value="3">
            {foreach $roles as $role}
            <option value="{$role.id}">
                {$role.role} 
            </option>
            {/foreach}
        </select> 
            <input type="hidden" name="user" value="admin">
        <br>
        {else}
            <input type="hidden" name="idRole" value="2">
        {/if}
        
        
        
        <label>Password</label><input type="password" name="password"><br>
        <label></label><input type="submit" value="Enviar">
    </form>

 </div>
{include file="template/footer.tpl" title="footer"}