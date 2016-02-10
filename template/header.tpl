<!DOCTYPE html>

<html>
    <head>
        <title>Tienda Online</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{$url}public/css/default.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="{$url}public/js/main.js"> </script>
    </head>
    <body>
        <div id="header">
            <div id="title">
                Tienda Online
            </div>
            <div  style="float: left">
                <a href="{$url}/index" >Index</a>
                <a href="{$url}/index" >Productos</a>
                <a href="{$url}/help" >Help</a>
                <a href="{$url}/user" >User</a>
            </div>
            <div id="cart" style="float: right">
                <a href="{$url}/pedido">Cesta</a>
                <label id="userLog">{$userLog}</label>
                <a href="{$url}/login">Log in</a>
            </div>
        </div>

            
