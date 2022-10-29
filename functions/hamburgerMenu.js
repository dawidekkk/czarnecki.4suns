'use strict';

const navWrapper = document.querySelector('.nav_wrapper');
const hamBtn = document.querySelector('.ham_btn');
const hamX = document.querySelector('.ham_x');
const overlay = document.querySelector('.overlay');
const links = document.querySelector('.link');

const active = () => {
  overlay.classList.remove('none')
  hamX.classList.remove('none');
  // hamBtn.classList.add('none'); // gdy menu jest aktywne, to dodaje non do ham
  navWrapper.classList.remove('none');
}

const deactive = () => {
  overlay.classList.add('none')
  hamBtn.classList.remove('none');
  hamX.classList.add('none');
  navWrapper.classList.add('none');
}

const openMenu = (e) => {
  e.addEventListener("click", () => {
    active();
  });
}

const closeMenu = (e) => {
  e.addEventListener("click", () => {
    deactive();
  })
}

// Jeżeli klikne link, menu się zamknie. 
// links.forEach(e => e.addEventListener("click", () => {
//   deactive();
// }))

openMenu(hamBtn);
closeMenu(overlay)
closeMenu(hamX)