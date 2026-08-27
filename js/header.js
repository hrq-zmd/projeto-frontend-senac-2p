const toggleBtn = document.querySelector(".menu-toggle"); // criação da constante toggleBtn ("toggle button") = método querySelector aplicado ao document (HTML), usando como parâmetro a classe .menu-toggle (CSS)
const menu = document.querySelector(".menu"); // criação da constante menu = método querySelector aplicado ao document (HTML), usando como parâmetro a classe .menu (CSS)

toggleBtn.addEventListener("click", () => { //aplica o método addEventListener, composto de uma arrow function, tendo "click" como parâmetro, de modo que, ao ser chamada, a função acessa a classe e muda o seu valor para "ativo"
  menu.classList.toggle("ativo");
});
