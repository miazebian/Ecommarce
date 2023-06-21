var popup = document.getElementById("popup");
var closePop = document.getElementById("closePop");
var oList = document.getElementById("OrderList");
var pList = document.getElementById("ProductList");
var modifyPop = document.getElementById("modifyPop");
var addPop = document.getElementById("addPop");

function openPopup() {
  popup.style.opacity = "1";
  popup.style.zIndex = "3000";
  oList.style.opacity = "0";
}

function closePopup() {
  popup.style.opacity = "0";
  popup.style.zIndex = "-1";
  oList.style.opacity = "1";
}

// function openPopupMod() {
//   modifyPop.style.opacity = "1";
//   modifyPop.style.zIndex = "0";
// }

// function closePopupMod() {
//   modifyPop.style.opacity = "0";
//   modifyPop.style.zIndex = "-1";
// }

function openPopupAdd() {
  addPop.style.opacity = "1";
  addPop.style.zIndex = "0";
}

function closePopupAdd() {
  addPop.style.opacity = "0";
  addPop.style.zIndex = "-1";
}

function openOrder() {
  pList.style.opacity = "0";
  pList.style.zIndex = "-5";
  oList.style.opacity = "1";
  oList.style.zIndex = "0";
  popup.style.opacity = "0";
  popup.style.zIndex = "-1";
}

function openProduct() {
  pList.style.opacity = "1";
  pList.style.zIndex = "0";
  oList.style.opacity = "0";
  oList.style.zIndex = "-5";
  popup.style.opacity = "0";
  popup.style.zIndex = "-1";
}