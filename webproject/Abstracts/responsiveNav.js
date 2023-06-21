var navList = document.getElementById("navList");
var menu = document.getElementById("menu");
var closeMenu = document.getElementById("closeMenu");
var screenWidth = window.innerWidth;

function showList() {
  navList.style.transition = "all .2s ease-out";
  menu.style.transition = "all .2s ease-out";
  closeMenu.style.transition = "all .2s ease-out";
  menu.style.display = "none";
  closeMenu.style.display = "block";
  navList.classList = "nav-bar_mid navCollapse";
  // navList.style.opacity = "1";
  // navList.style.zIndex = "3000";
}

function hideList() {
  navList.style.transition = "all .2s ease-out";
  menu.style.transition = "all .2s ease-out";
  closeMenu.style.transition = "all .2s ease-out";
  menu.style.display = "block";
  closeMenu.style.display = "none";
  navList.classList = "nav-bar_mid";
  // navList.style.opacity = "0";
  // navList.style.zIndex = "-1";
}