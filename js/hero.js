let slideIndex = 1;
showSlides(slideIndex);

function changeSlide(n) { //Avança ou volta slides
    showSlides(slideIndex += n);
}

function showSlides(n) { // Controla a exibição e lógica da sequencia de slides
    let i;
    let slides = document.getElementsByClassName("slide"); // Busca todos os elementos com a classe .slide
        
        if(n > slides.length) { // quando acabar a apresentação, retorna ao início
            slideIndex = 1;
        }

        if(n < 1) { // se for antes do primeiro slide, vai para o ultimo
            slideIndex = slides.length;
        }

        for(i = 0; i < slides.length; i++) { // Esconde todos os slides mudando o display para none
            slides[i].style.display = "none";
        }
    
        slides[slideIndex - 1].style.display = "block"; // mostra apenas o slide atual mudando o display para block
}

setInterval( () => { // passa os slides automaticamente a cada 5 segundos (5000 ms)
    changeSlide(1);
},
5000);

