1)criar colocar todos os documentos baixados em uma pasta chamada "plugin"

2)colocar as seguintes linhas no seu código dentro da tag <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.red-orange.min.css">
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="plugin/msp28imgView.css">
<script src="plugin/msp28imgView.js"></script>

3)criar um banco de dados e importar o arquivo sql "msp28imgView.sql"

4)abrir o documento php "msp28imgView.php" em um editor texto e alterar as sequintes linhas, com as informações solicitadas:
$servername = ""; #servidor
$username = ""; #usuário
$password = ""; #senha
$dbname = ""; #nome do banco de dados que você criou

5)copiar o código que está no arquivo txt "msp28imgView.txt" para dentro do arquivo html

6)coloque o atributo onclick="open_midia();" e envie o id da imagem/video que vc quer exibir no parâmetro da função
