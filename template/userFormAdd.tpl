{include file="template/header.tpl" title="encabezado"}
<div id="content">
    <br>
    <h2>Alta de usuarios</h2>
    
    <form action="{$url}/user/insert" method="post">
        <label>Nombre</label><input type="text" name="name"><br>
        <label>Role</label>
        
        <select name="idRole" >
            <option selected value="0">
            {foreach $roles as $role}
            <option value="{$role.id}">
                {$role.role} 
            </option>
            {/foreach}
        </select> 
        
        <br>

        <label>Password</label><input type="password" name="password"><br>
        <label></label><input type="submit" value="Enviar">
    </form>

 </div>
{include file="template/footer.tpl" title="footer"}