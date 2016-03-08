{include file="template/header.tpl" title="encabezado"}
<div id="content">
    <h2>Login</h2>
     <form action="{$url}/login/login" method="post">
        <label>Nombre</label><input type="text" name="name"><br>
        <label>Password</label><input type="password" name="password"><br>
        <label></label><input type="submit" value="Enviar">
    </form>
    <a href="{$url}user/add">Registrarse</a>
    
    <br>
    
    <h4>{$error}</h4>
    
 </div>
{include file="template/footer.tpl" title="footer"}