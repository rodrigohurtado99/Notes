
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Text from the layout (TOP)</p>
    <hr>
    @yield('content') {{-- Cria uma parte de conteúdo na nossa aplicação que irá ser extendido em outras páginas --}}
    <hr>
    <p>Text from the layout (BOTTOM)</p>
</body>
</html>