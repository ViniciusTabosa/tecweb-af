function novoElemento(tagName, className) {
    const elemento = document.createElement(tagName)
    elemento.className = className
    return elemento
}

function Barreira(reversa = false) {
    this.elemento = novoElemento('div', 'barreira')
    const borda = novoElemento('div', 'borda')
    const corpo = novoElemento('div', 'corpo')
    this.elemento.appendChild(reversa ? corpo : borda)
    this.elemento.appendChild(reversa ? borda : corpo)

    this.setAltura = altura => corpo.style.height = `${altura}px`

}

// const b= new Barreira(false)
// b.setAltura(300)
// document.querySelector('[wm-flappy]').appendChild(b.elemento)


function ParDeBarreiras(altura, abertura, popsicaoNaTela) {
    this.elemento = novoElemento('div', 'par-de-barreiras')
    this.superior = new Barreira(true)
    this.inferior = new Barreira(false)

    this.elemento.appendChild(this.superior.elemento)
    this.elemento.appendChild(this.inferior.elemento)


     this.sortearAbertura = () => {
        const alturaSuperior = Math.random() * (altura - abertura)
        const alturaInferior = altura - abertura - alturaSuperior
        this.superior.setAltura(alturaSuperior)
        this.inferior.setAltura(alturaInferior)
    }
    this.getX = () => parseInt(this.elemento.style.left.split('px')[0])
    this.setX =  popsicaoNaTela => this.elemento.style.left = `${popsicaoNaTela}px`
    this.getLargura = () => this.elemento.clientWidth

    this.sortearAbertura()
    this.setX(popsicaoNaTela)
 } 

// const b= new ParDeBarreiras(550,250,500)
// document.querySelector('[wm-flappy]').appendChild(b.elemento)

function Barreiras(altura, largura, abertura, espaco, notificarPonto) {
    this.pares = [
        new ParDeBarreiras(altura, abertura, largura),
        new ParDeBarreiras(altura, abertura, largura + espaco),
        new ParDeBarreiras(altura, abertura, largura + espaco * 2),
        new ParDeBarreiras(altura, abertura, largura + espaco * 3)
    ]

    const deslocamento = velocidadeJogo()
    this.animar = () => {
        this.pares.forEach(par => {
            par.setX(par.getX() - deslocamento)

            if (par.getX() < -par.getLargura()) {
                par.setX(par.getX() + espaco * this.pares.length)
                par.sortearAbertura()
            }
            const meio = largura / 2
            const cruzouMeio = par.getX() + deslocamento >= meio
                && par.getX() < meio
            if (cruzouMeio) {
                notificarPonto()
            }
        })
    }
}

const barreiras = new Barreiras(500, 300, 100, 400) 
const areaDoJogo = document.querySelector('[wm-flappy]')

// barreiras.pares.forEach( par => areaDoJogo.appendChild(par.elemento)) // criado outras barreiras no fundo

setInterval(() => {
    barreiras.animar()
},50) 


function Passaro(alturaJogo) {
    let voando = false

    this.elemento = novoElemento('img', 'passaro')
    this.elemento.src = mudarPersonagem()

    this.getY = () => parseInt(this.elemento.style.bottom.split('px')[0])
    this.setY = y => this.elemento.style.bottom = `${y}px`

    window.onkeydown = e => voando = true
    window.onkeyup = e => voando = false

    this.animar = () => {
        const novoY = this.getY() + (voando ? mudarVelocidadePerson()[0] : mudarVelocidadePerson()[1])
        const alturaMaxima = alturaJogo - this.elemento.clientWidth

        if (novoY <= 0) {
            this.setY(0)
        } else if (novoY >= alturaMaxima) {
            this.setY(alturaMaxima)
        } else {
            this.setY(novoY)
        }
    }
    this.setY(alturaJogo / 2)
}

// const barreiras = new Barreiras(700, 400, 200, 400)
// const passaro = new Passaro(700)

// const areaDoJogo = document.querySelector('[wm-flappy]')

// areaDoJogo.appendChild(passaro.elemento)
// barreiras.pares.forEach( par => areaDoJogo.appendChild(par.elemento)) 

// setInterval(() => {
//       barreiras.animar()
//       passaro.animar() 
// },20)


 function Progresso() {

    this.elemento = novoElemento('span', 'progresso')
    this.atualizarPontos = pontos => {
        this.elemento.innerHTML = pontos
    }
    this.atualizarPontos(0)
}

// const barreiras = new Barreiras(700, 400, 200, 400)
// const passaro = new Passaro(700)

// const areaDoJogo = document.querySelector('[wm-flappy]')

// areaDoJogo.appendChild(passaro.elemento)
// barreiras.pares.forEach( par => areaDoJogo.appendChild(par.elemento))


 function estaoSobrepostos(elementoA, elementoB) {

    const a = elementoA.getBoundingClientRect()
    const b = elementoB.getBoundingClientRect()
    const horizontal = a.left + a.width >= b.left && b.left + b.width >= a.left
    const vertical = a.top + a.height >= b.top && b.top + b.height >= a.top

    return horizontal && vertical
}

function colidiu(passaro, barreiras) {
    let colidiu = false

    barreiras.pares.forEach(parDeBarreiras => {
        if (!colidiu) {
            const superior = parDeBarreiras.superior.elemento
            const inferior = parDeBarreiras.inferior.elemento
            colidiu = estaoSobrepostos(passaro.elemento, superior)
                || estaoSobrepostos(passaro.elemento, inferior)
        }
    })
    return colidiu

}

 function FlappyBird() {
    let pontos = 0
    const areaDoJogo = document.querySelector('[wm-flappy]')
    const altura = areaDoJogo.clientHeight
    const largura = areaDoJogo.clientWidth

    const progresso = new Progresso()
    const barreiras = new Barreiras(altura, largura, intervaloCanos(), distanciaCanos(),
        () => progresso.atualizarPontos(++pontos))

    const passaro = new Passaro(altura)
    //200 - mudar distancia/abertura dos canos e 400 - mudar intevalo dos canos
    //150, 200 e 250 para abertura
    //300, 400, 500
    areaDoJogo.appendChild(progresso.elemento)
    areaDoJogo.appendChild(passaro.elemento)
    barreiras.pares.forEach(par => areaDoJogo.appendChild(par.elemento))    

    this.start = () => {
        const temporizador = setInterval(() => {
            barreiras.animar()
            passaro.animar()

            if(tipoJogo() == 'real'){
                if(colidiu(passaro,barreiras)){
                    clearInterval(temporizador) 
                }
                
            }
            
        }, 20)
    }
}




function velocidadeJogo(){
    const url = new URLSearchParams(window.location.search)
    const urlVJ = url.get('vj')

    return urlVJ
}

function mudarPersonagem(){
    const url = new URLSearchParams(window.location.search)
    const urlPe = url.get('pe')

    switch (urlPe){
        case 'passaro':
            return 'img/passaro.png';
        break;
        case 'nyan':
            return 'img/nyan-cat-107x75.png';
        break;
        case 'fantasma':
            return 'img/fantasma-comunismo-107x95.png';
        break;
        default:
            return null;
    }
}

function mudarVelocidadePerson(){
    const url = new URLSearchParams(window.location.search)
    const urlVP = url.get('vp')

    switch (urlVP){
        case 'baixa':
            return [4, -3];
        break;
        case 'media':
            return [8, -5];
        break;
        case 'rapida':
            return [12, -7];
        break;
        default:
            return vel[8, -5];
    }
}

function tipoJogo(){
    const url = new URLSearchParams(window.location.search)
    const urlTJ = url.get('tj')

    return urlTJ
}

function intervaloCanos(){
    const url = new URLSearchParams(window.location.search)
    const urlIC = url.get('ic')

    switch (urlIC){
        case 'facil':
            return 250;
        break;
        case 'medio':
            return 200;
        break;
        case 'dificil':
            return 150;
        break;
        default:
            return 200;
    }
}

function distanciaCanos(){
    const url = new URLSearchParams(window.location.search)
    const urlDC = url.get('dc')

    switch (urlDC){
        case 'facil':
            return 500;
        break;
        case 'medio':
            return 400;
        break;
        case 'dificil':
            return 250;
        break;
        default:
            return 400;
    }
}

new FlappyBird().start()