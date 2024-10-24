<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #mensaje {
            color: #F00;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <input type="text" name="numero" id="numero">
    <a href="javascript:void(0);" onClick="enviarAjax();">
        Enviar con Ajax
    </a>
    <div id="mensaje"></div>
</body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../scripts/scripts.js"></script>
</html> 