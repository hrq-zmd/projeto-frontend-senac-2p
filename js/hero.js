let slideIndex = 1;
showSlides(slideIndex);

function changeSlide(n) { //Avança ou volta slides - parâmetro n é atribuído no onclick do html
    showSlides(slideIndex += n);
}

function showSlides(n) { // Função tradicional para controlar a exibição e lógica da sequencia de slides
    let i; // variável contador
    let slides = document.getElementsByClassName("slide"); // Variável slides recebe método que busca no documento html todos os elementos com a classe .slide
        
        if(n > slides.length) { // Condicional na qual se o parâmetro da função for maior que a propriedade de "tamanho" de slides, quando acabar a apresentação, retorna ao início
            slideIndex = 1;
        }

        if(n < 1) { // Condicional na qual se o parâmetro recebido pela função for menor que 1, se for antes do primeiro slide, vai para o ultimo
            slideIndex = slides.length;
        }

        for(i = 0; i < slides.length; i++) { // Laço de repetição que esconde todos os slides mudando o display para none
            slides[i].style.display = "none";
        }
    
        slides[slideIndex - 1].style.display = "block"; // mostra apenas o slide atual mudando o display para block
}

setInterval( () => { // Função, na qual seu parâmetro é uma Arrow Function que chama a função changeSLide, que após executada, passa os slides automaticamente a cada 5 segundos (5000 ms)
    changeSlide(1);
    },
5000
);

