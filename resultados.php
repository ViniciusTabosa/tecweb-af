<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Bird</title>
    <link rel="stylesheet" href="flappy.css">
    <link rel="stylesheet" href="resultados.css">
</head>

<body class="conteudo">
    <h1>Flappy Bird</h1>
    <h3>Fim de jogo</h3>
    <div id="div-resultado">
        <?php
            echo '
            <p><strong>Jogador:</strong> '.$_GET['jo'].'</p>
            <p><strong>Pontuação Final:</strong> 0</p>
            ';
        ?>
    </div>
    <table>
        <tr>
            <td class="td-resultado"><strong>Jogador</strong></td>
            <td class="td-resultado">Cenário</td>
            <td class="td-resultado">Abertura dos Canos</td>
            <td class="td-resultado">Distancia dos Canos</td>
            <td class="td-resultado">Velocidade do jogo</td>
            <td class="td-resultado">Personagem</td>
            <td class="td-resultado">Modo de jogo</td>
            <td class="td-resultado">Velocidade do personagem</td>
            <td class="td-resultado">Pontuação</td>
            <td class="td-resultado"><strong>Pontuação final</strong></td>
        </tr>
        <tr>
            <?php
                include 'Conexao.php';

                $objConexao = new Conexao();
                $conexaoBD = $objConexao->getConexao();

                $jogador = $_GET['jo'];

                $sql = "select * from infopartidas where jogador like '%".$jogador."%'";

                $consulta =  $conexaoBD->query($sql);
                

                if($consulta->num_rows > 0){
                    while($arrayConsulta = $consulta->fetch_array(MYSQLI_ASSOC)){
                        echo '
                            <tr>
                                <td class="td-linha">'.$arrayConsulta['jogador'].'</td>
                                <td class="td-linha">'.$arrayConsulta['cenario'].'</td>
                                <td class="td-linha">'.$arrayConsulta['intervalocanos'].'</td>
                                <td class="td-linha">'.$arrayConsulta['distanciacanos'].'</td>
                                <td class="td-linha">'.$arrayConsulta['velocidadejogo'].'</td>
                                <td class="td-linha">'.$arrayConsulta['personagem'].'</td>
                                <td class="td-linha">'.$arrayConsulta['tipojogo'].'</td>
                                <td class="td-linha">'.$arrayConsulta['velocidadeperson'].'</td>
                                <td class="td-linha">'.$arrayConsulta['pontuacao'].'</td>
                                <td class="td-linha">'.$arrayConsulta['pontuacaofinal'].'</td>
                            </tr>
                        ';
                    }
                }
                
            ?>
        </tr>
    </table>

    <button><a href="index.php">Jogar novamente</a></button>
</body>

</html>