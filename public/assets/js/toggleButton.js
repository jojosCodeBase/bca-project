const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
  document.querySelector("#sidebar").classList.toggle("collapsed");
})


// const sidebarToggle = document.querySelector("#sidebar-toggle");
// const sidebar = document.querySelector("#sidebar");

// sidebarToggle.addEventListener("click", function () {
//   if (window.innerWidth < 992) { // Check if window width is less than 992px
//     sidebar.classList.toggle("collapsed");
//   }
// });