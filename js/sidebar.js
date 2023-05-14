var li_items = document.querySelectorAll(".sidebar ul li");
var hamburger = document.querySelector(".hamburger");
var wrapper = document.querySelector(".wrapper");

 hamburger.addEventListener("click", () => {

    hamburger.closest(".wrapper").classList.toggle("hover_collapse");
})