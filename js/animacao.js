let seta = document.querySelectorAll(".seta");
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".menu-side-bar");

console.log(seta);
for (var i = 0; i < seta.length; i++) {
    seta[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        console.log(arrowParent);
        arrowParent.classList.toggle("showMenu");
    });
}

sidebarBtn.addEventListener("click", (e) => {
    console.log(e);
    sidebar.classList.toggle("close");
});
console.log(sidebar);