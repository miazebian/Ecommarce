/* Slide Show Script */

let i = 0;
let time = 5000;
let images = [];
images[0] = "/img/photo-0.jpg";
images[1] = "/img/photo-1.jpg";
images[2] = "/img/photo-2.jpg";
images[3] = "/img/photo-3.jpg";
images[4] = "/img/photo-4.jpg";
let slide = document.getElementById("slider");
let radio0 = document.getElementById("radio0");
let radio1 = document.getElementById("radio1");
let radio2 = document.getElementById("radio2");
let radio3 = document.getElementById("radio3");
let radio4 = document.getElementById("radio4");
radio0.checked = true;

function nextImage() {
  if (i == images.length - 1) {
    i = 0;
  } else {
    i++;
  }

  if (i == 0) {
    radio0.checked = true;
  }
  if (i == 1) {
    radio1.checked = true;
  }
  if (i == 2) {
    radio2.checked = true;
  }
  if (i == 3) {
    radio3.checked = true;
  }
  if (i == 4) {
    radio4.checked = true;
  }
  slide.src = images[i];
}

function prevImage() {
  if (i == 0) {
    i = 4;
  } else {
    i--;
  }

  if (i == 0) {
    radio0.checked = true;
  }
  if (i == 1) {
    radio1.checked = true;
  }
  if (i == 2) {
    radio2.checked = true;
  }
  if (i == 3) {
    radio3.checked = true;
  }
  if (i == 4) {
    radio4.checked = true;
  }

  slide.src = images[i];
}

function imageOne() {
  i = 0;
  slide.src = images[i];
}

function imageTwo() {
  i = 1;
  slide.src = images[i];
}

function imageThree() {
  i = 2;
  slide.src = images[i];
}

function imageFour() {
  i = 3;
  slide.src = images[i];
}

function imageFive() {
  i = 4;
  slide.src = images[i];
}

setInterval("nextImage()", time);

/* Hover Image Script */

function hoverImage(a) {
  let newProducts = [];
  newProducts[0] = "/img/photo-5.jpg";
  newProducts[1] = "/img/photo-6.jpg";
  newProducts[2] = "/img/photo-7.jpg";
  newProducts[3] = "/img/photo-8.jpg";

  let img0 = document.getElementById("product00");
  let img1 = document.getElementById("product01");
  let img2 = document.getElementById("product02");
  let img3 = document.getElementById("product03");
  let img4 = document.getElementById("product10");
  let img5 = document.getElementById("product11");
  let img6 = document.getElementById("product12");
  let img7 = document.getElementById("product13");
  let icons0 = document.getElementById("productIcons0");
  let icons1 = document.getElementById("productIcons1");
  let icons2 = document.getElementById("productIcons2");
  let icons3 = document.getElementById("productIcons3");
  let icons4 = document.getElementById("productIcons4");
  let icons5 = document.getElementById("productIcons5");
  let icons6 = document.getElementById("productIcons6");
  let icons7 = document.getElementById("productIcons7");
  if (a == 0) {
    img0.src = newProducts[1];
    icons0.style.visibility = "visible";
  }
  if (a == 1) {
    img1.src = newProducts[2];
    icons1.style.visibility = "visible";
  }
  if (a == 2) {
    img2.src = newProducts[3];
    icons2.style.visibility = "visible";
  }
  if (a == 3) {
    img3.src = newProducts[0];
    icons3.style.visibility = "visible";
  }
  if (a == 4) {
    img4.src = newProducts[1];
    icons4.style.visibility = "visible";
  }
  if (a == 5) {
    img5.src = newProducts[2];
    icons5.style.visibility = "visible";
  }
  if (a == 6) {
    img6.src = newProducts[3];
    icons6.style.visibility = "visible";
  }
  if (a == 7) {
    img7.src = newProducts[0];
    icons7.style.visibility = "visible";
  }
  if (a == 8) {
    img0.src = newProducts[0];
    img1.src = newProducts[1];
    img2.src = newProducts[2];
    img3.src = newProducts[3];
    img4.src = newProducts[0];
    img5.src = newProducts[1];
    img6.src = newProducts[2];
    img7.src = newProducts[3];
    icons0.style.visibility = "hidden";
    icons1.style.visibility = "hidden";
    icons2.style.visibility = "hidden";
    icons3.style.visibility = "hidden";
    icons4.style.visibility = "hidden";
    icons5.style.visibility = "hidden";
    icons6.style.visibility = "hidden";
    icons7.style.visibility = "hidden";
  }
}