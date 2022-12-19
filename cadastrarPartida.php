<?php
    include("Conexao.php");

    $jogador = $_POST['jogador'];
    $cenario = $_POST['cenario'];
    $intervalosCanos = $_POST['abertura'];
    $distanciaCanos = $_POST['distancia'];
    $velocidadeJogo = $_POST['veloc-jogo'];
    $personagem = $_POST['personagens'];
    $tipoJogo = $_POST['modo-jogo'];
    $velocidadePersonagem = $_POST['veloc-person'];
    $pontuacao = strval($_POST['pontuacao']);
    $pontuacaoFinal = 0;

    $retornoBD;
    $conexaoBD;

    $objConexao = new Conexao();
    $conexaoBD = $objConexao->getConexao();

    $mysqli = $conexaoBD->prepare("INSERT INTO `infopartidas` (`idpartida`, `jogador`, `cenario`, `intervalocanos`, `distanciacanos`, `velocidadejogo`, `personagem`, `tipojogo`, `velocidadeperson`, `pontuacao`, `pontuacaofinal`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");

    $mysqli->bind_param('ssssisssi', $jogador, $cenario, $intervalosCanos, $distanciaCanos, $velocidadeJogo, $personagem, $tipoJogo, $velocidadePersonagem, $pontuacao);

    $retorno = $mysqli->execute();

    echo'<script>window.location.href="flappy.php?jo='.$jogador.'&cen='.$cenario.'&ic='.$intervalosCanos.'&dc='.$distanciaCanos.'&vj='.$velocidadeJogo.'&pe='.$personagem.'&tj='.$tipoJogo.'&vp='.$velocidadePersonagem.'&po='.$pontuacao.'"</script>';
