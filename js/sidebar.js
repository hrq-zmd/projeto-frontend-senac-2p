const departmentTitles = document.querySelectorAll(".department_title");

departmentTitles.forEach((title) => {
  title.addEventListener("click", () => {
    const departmentList = title.nextElementSibling;

    departmentList.classList.toggle("ativo");
  });
});

const departmentSubcategories = document.querySelectorAll(
  ".department_subcategory",
);

departmentSubcategories.forEach((subcategory) => {
  subcategory.addEventListener("click", (event) => {
    event.preventDefault();

    const subcategoryList = subcategory.nextElementSibling;

    subcategoryList.classList.toggle("ativo");
  });
});
