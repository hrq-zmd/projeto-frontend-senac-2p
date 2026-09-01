let slideIndex = 1;
showSlides(slideIndex);

function changeSlide(n) { //Avança ou volta slides
    showSlide(slideIndex += n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");
        
        if(n > slides.length) {
            slideIndex = 1;
        }

        if(n < 1) {
            slideIndex = slides.length;
        }

        for(i = 0; i < slides.length; i++) {
            slides[i].computedStyleMap.display = "none";
        }
    
        slides[slidesIndex - 1].computedStyleMap.display = "block";
}

setInterval( () => {
    changeSlide(1);
},
5000);

