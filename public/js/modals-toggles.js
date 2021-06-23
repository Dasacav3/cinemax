// "use strict";

// Sidebar Toggle Codes;
var sidebarOpen = false;
var sidebar = document.getElementById('navbar_responsive');
var sidebarCloseIcon = document.getElementById('sidebarIcon');

sidebarCloseIcon.addEventListener('click', () => {
  if (!sidebarOpen) {
    sidebar.classList.add('show');
    sidebarOpen = true;
  }else{
    sidebar.classList.remove('show');
    sidebarOpen = false;
  }
})

// function toggleSidebar() {
//   if (!sidebarOpen) {
//     sidebar.classList.add('show');
//     sidebarOpen = true;
//   }
// }

// function closeSidebar() {
//   if (sidebarOpen) {
//     sidebar.classList.remove('show');
//     sidebarOpen = false;
//   }
// }