<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@200;300;400&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <title>Controle de Exames Espaço Pet Care</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        form {
            font-family: 'Nunito', sans-serif;
        }

        .emexecucao {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: wrap;
        
        }

        .emexecut a {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-right: 10px;
            border: 0.5px solid black;
        
        }

        .cabcorpo h3{
            justify-content: center;
            font-family: 'Fredoka One', cursive;
        }

        .estat {
        padding: 3px;
        border-radius: 3px;
        }

        .busca {
            background-color: rgb(237, 197, 150);
            border-radius: 12px;
            padding: 10px;
            margin-top: 10px;
        }

        .cabcorpo {
            background-color: rgb(237, 197, 150);
            border-radius: 12px;
            padding: 10px;
            margin-top: 10px;
        }

        .resultpesq p{
            margin-left: 8px;
        }

        .pesqbt {
            border-radius: 3px;
            border: 1px rgb(121, 121, 121) solid;
            cursor: pointer;
            margin-top: 3px;
        }

        .pesqbt:hover{
            background-color: rgb(121, 121, 121);
            transition: 0.5s;
            color: azure;
        }

        
        .enviorel {
            padding: 3px;
            margin-left: 3px;
            border-radius: 3px;
        }
    </style>    
</head>
<div>
    <div class="cabecalho"><img src="images/logo.JPG" alt=""> <h1>CONTROLE DE EXAMES</h1></div>
    <nav class="navbar">
        <div class="item"><a href="index.php"><i class="fa-solid fa-house"></i> Início</a></div>
        <div class="item"><a href="cadnovoexame.php"> <i class="fa-solid fa-circle-plus"></i> Incluir novo Exame</a></div>
        <div class="item"><a href="index.php?pesquisa=sim" target="php/corpo.php"> <i class="fa-solid fa-magnifying-glass"></i> Consultar Status de Exame</a></div>
    </nav>
</div>

    <?php include("php/corpo.php") ?>
</div>
</body>
<script src="https://kit.fontawesome.com/707f1f01cc.js" crossorigin="anonymous"></script>
</html>