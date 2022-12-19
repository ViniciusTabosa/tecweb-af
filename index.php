<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Bird</title>
    <link rel="stylesheet" href="flappy.css">
    <script src="js/flappy.js"></script>
</head>

<body class="conteudo">
    <h1>Flappy Bird</h1>
    <div id="form">
        <h4>Configurações do jogo</h4>
        <form method="POST" action="cadastrarPartida.php">
            <span class="span-form">
                Nome do jogador:
                <input type="text" name="jogador" id="inputtext-jogador" required>
            </span>
            Cenário do jogo:
            <span class="span-form">
                <input type="radio" name="cenario" value="diurno" id="diurno" checked><label for="diurno">Diurno</label>
                <input type="radio" name="cenario" value="noturno" id="noturno"><label for="noturno">Noturno</label>
            </span>

            <span class="span-form">
                Intervalo entre abertura dos canos:
                <input type="radio" name="abertura" value="facil" id="aber-facil"><label for="aber-facil">Fácil</label>
                <input type="radio" name="abertura" value="medio" id="aber-medio" checked><label for="aber-medio">Médio</label>
                <input type="radio" name="abertura" value="dificil" id="aber-dificil"><label for="aber-dificil">Difícil</label>
            </span>

            <span class="span-form">
                Distância entre os canos:
                <input type="radio" name="distancia" value="facil" id="dist-facil"><label for="dist-facil">Fácil</label>
                <input type="radio" name="distancia" value="medio" id="dist-medio" checked><label for="dist-medio">Médio</label>
                <input type="radio" name="distancia" value="dificil" id="dist-dificil"><label for="dist-dificil">Difícil</label>
            </span>

            <span class="span-form">
               Velocidade do jogo:
               1<input type="range" name="veloc-jogo" id="veloc-jogo" min="1" max="10">10
            </span>

            <span class="span-form">
                Personagens:
                <select name="personagens" id="select-personagens">
                    <option value="passaro">Pássaro</option>
                    <option value="nyan">Nyan Cat</option>
                    <option value="fantasma">Fantasminha Camarada</option>
                </select>
            </span>

            <span class="span-form">
                Tipo do jogo:
                <input type="radio" name="modo-jogo" value="treino" id="modo-treino"><label for="modo-treino">Treino</label>
                <input type="radio" name="modo-jogo" value="real" id="modo-real" checked><label for="modo-real">Real</label>
            </span>

            <span class="span-form">
                Velocidade do personagem:
                <input type="radio" name="veloc-person" value="baixa" id="veloc-baixa"><label for="veloc-baixa">Baixa</label>
                <input type="radio" name="veloc-person" value="media" id="veloc-media" checked><label for="veloc-media">Média</label>
                <input type="radio" name="veloc-person" value="rapida" id="veloc-rapida"><label for="veloc-rapida">Rápida</label>
            </span>

            <span class="span-form">
                Pontuação:
                <input type="radio" name="pontuacao" value="1" id="pont-1" checked><label for="pont-1">1</label>
                <input type="radio" name="pontuacao" value="10" id="pont-10"><label for="pont-10">10</label>
                <input type="radio" name="pontuacao" value="100" id="pont-100"><label for="pont-100">100</label>
            </span>

            <input type="submit" value="Jogar">
        </form>

    </div>
</body>

</html>