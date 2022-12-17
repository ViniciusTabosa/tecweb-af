<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Bird</title>
    <link rel="stylesheet" href="flappy.css">

    <style>
        [wm-flappy]{
            <?php
                $tema = $_GET['cenario'];
                if($tema == 'noturno'){
                    echo'background: #2F3430;';
                }
            ?>
        }

        .barreira .borda{
            <?php
                $tema = $_GET['cenario'];
                if($tema == 'noturno'){
                    echo'background: linear-gradient(90deg, #446500, #84BA28);';
                }
            ?>
        }

        .barreira .corpo{
            <?php
                $tema = $_GET['cenario'];
                if($tema == 'noturno'){
                    echo'background: linear-gradient(90deg, #446500, #84BA28);';
                }
            ?>
        }
    </style>
</head>

<body class="conteudo">
    <h1>Flappy Bird</h1>
    <div wm-flappy>

    <!-- 
    <img class="passaro" src="img/passaro.png" alt="passaro">
    <div class="par-de-barreiras">
        <div class="barreira">
            <div class="corpo"> </div>
            <div class="borda"></div>
        </div>
        <div class="barreira">
            <div class="borda"> </div>
            <div class="corpo"></div>
        </div>
    </div> 
    <div class="progresso"> 10 </div>   
    </div>
    -->

   <script src="js/flappy.js"></script>
</body>

</html>