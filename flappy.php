<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Bird</title>
    <link rel="stylesheet" href="flappy.css">
    
    <?php
        $tema = $_GET['cen'];
        if($tema == 'noturno'){
            echo'
            <style>
                [wm-flappy]{
                    background-color: #2F3430;
                }

                .barreira .borda{
                    background: linear-gradient(90deg, #446500, #84BA28);
                }

                .barreira .corpo{
                    background: linear-gradient(90deg, #446500, #84BA28);
                }
            </style>
            ';
        }
    ?>
</head>

<body class="conteudo">
    <h1>Flappy Bird</h1>

    <div wm-flappy>

   <script src="js/flappy.js"></script>
</body>

</html>