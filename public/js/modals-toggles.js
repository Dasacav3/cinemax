// "use strict";

// Sidebar Toggle Codes;
var sidebarOpen = false;
var sidebar = document.getElementById('sidebar');
var sidebarCloseIcon = document.getElementById('sidebarIcon');

function toggleSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar_responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar_responsive');
    sidebarOpen = false;
  }
}

// // Modals reservaciones
// var pop_up_add = document.getElementById("pop-up-add");
// var pop_up_wrap_add = document.getElementById("form_register");

// var pop_up_edit = document.getElementById("pop-up-edit");
// var pop_up_wrap_edit = document.getElementById("form_edit");

// var abrir_add = document.getElementById('abrirPopup-add');
// var abrir_edit = document.getElementById('abrirPopup-edit');

// function showPopup_add() {
// 	pop_up_add.classList.add("show");
// 	pop_up_wrap_add.classList.add("show");
// }

// function showPopup_edit() {
// 	pop_up_edit.classList.add("show");
// 	pop_up_wrap_edit.classList.add("show");
// }

// abrir_add.addEventListener("click", () => {
// 	showPopup_add();
// });

// abrir_edit.addEventListener("click", () => {
// 	showPopup_edit();
// });

// var cerrar_add = document.getElementById("closePopup-add");
// var cerrar_edit = document.getElementById("closePopup-edit");

// cerrar_add.addEventListener('click', () =>{
// 	pop_up_add.classList.remove("show");
// 	pop_up_wrap_add.classList.remove("show");
// })

// cerrar_edit.addEventListener('click', () =>{
// 	pop_up_edit.classList.remove("show");
// 	pop_up_wrap_edit.classList.remove("show");
// })