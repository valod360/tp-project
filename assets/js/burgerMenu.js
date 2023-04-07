document.addEventListener("DOMContentLoaded", function () {
    var burgerIcon = document.querySelector(".burger-icon");
    var horizontalList = document.querySelector(".menu-burger ul.horizontalList");

    burgerIcon.addEventListener("click", function () {
        horizontalList.classList.toggle("open");
    });
});
