function mudarCenario(){
    let opCenario = document.querySelector('input[name="cenario"]:checked').value;

    let jogo = document.querySelector('[wm-flappy]')

    if(opCenario == 'diurno'){
        jogo.style.background = "var(--backgroundDark)"
    }else if(opCenario == 'noturno'){
        jogo.style.background = "var(--backgroundLight)"
    }
}