const departmentTitles = document.querySelectorAll(".department_title"); // criação da constante departmentTitles = aplicação do método querySelectorAll, para selecionar todos os parâmetros iguais (true) à classe .department_title (CSS)

departmentTitles.forEach((title) => { // método forEach aplicado ao vetor departmentTitles em que, através de uma arrow function, para cada parâmetro title se aplica o método addEventListener 
  title.addEventListener("click", () => {
    const departmentList = title.nextElementSibling; // ao receber o evento "click", à constante departmentList é atribuida a propriedade nextElementSibling (próximo elemento irmão)

    departmentList.classList.toggle("ativo"); // acessa a lista de classes de departmentList e aplica o método toggle que alterna para os estilos da classe:ativo para "ativo"
  });
});

const departmentSubcategories = document.querySelectorAll(
  // criação da constante departmentTitles = aplicação do método querySelectorAll, para selecionar todos os parâmetros iguais (true) à classe .department_subcategory (CSS)
  ".department_subcategory",
);

departmentSubcategories.forEach((subcategory) => {
  // método forEach aplicado ao vetor departmentTitles em que, por meio de uma arrow function, para cada parâmetro title se aplica o método addEventListener
  subcategory.addEventListener("click", (event) => {
    // ao receber o evento "click" execute a função, recebendo o objeto event do navegador ao ser executado o click
    event.preventDefault(); // aplica o método preventDefault ao objeto evento recebido, previnindo o comportamento padrão do navegador

    const subcategoryList = subcategory.nextElementSibling; // à constante departmentList é atribuida a propriedade nextElementSibling (próximo elemento irmão) de subcategory

    subcategoryList.classList.toggle("ativo"); // acessa a propriedade lista de classes de subcategoryList e aplica o método toggle que alterna para os estilos da classe:ativo
  });
});
