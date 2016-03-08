<!DOCTYPE html>

<html>
    <head>
        <title>Tienda Online</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{$url}public/css/default.css" />
{*        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>*}
        <script src="{$url}public/js/jquery-1.12.0.min.js"> </script>
        {foreach $scripts as $script}
             <script src="{$url}public/js/{$script}"> </script>
        {/foreach}

{*        <script src="{$url}public/js/main.js"> </script>*}
    </head>
    <body>
        <div id="header">
            <div id="title">
                Tienda Online
            </div>
            <div  id="sections">
                <a href="{$url}index" >Index</a>
                <a href="{$url}producto" >Productos</a>
                 {if $role == 3}
                    <a href="{$url}pedido" >Pedidos</a>
                    <a href="{$url}user" >Usuarios</a>
                {/if}
                <a href="{$url}help" >Ayuda</a>
               
            </div>
            <div id="cart">
                {if $userLog != "Invitado"}
                <label id="userLog">Bienvenido, {$userLog}</label>
                <a href="{$url}login/logout">Log out</a>
                    {if $role != 3}
                        <a href="{$url}pedido" id="cesta">Cesta</a>
                    {/if}
                {else}
                <a href="{$url}login/index">Log in</a>
                {/if}
                
            </div>
        </div>

            
