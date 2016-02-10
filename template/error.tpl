{include file="template/header.tpl" title="encabezado"}
<div id="content">
    <br>
    Estamos en el ERROR
    <br>
    {$ex->getMessage()} <br>
    Código de error: {$ex->getCode()}
    <pre>{$ex}</pre>
     
</div>
{include file="template/footer.tpl" title="footer"}