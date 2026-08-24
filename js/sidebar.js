const departmentTitles = document.querySelectorAll(".department_title");

departmentTitles.forEach((title) => {
  title.addEventListener("click", () => {
    const list = title.nextElementSibling;

    list.classList.toggle("ativo");
  });
});
