'use strict'

const navWrapper = document.querySelector('.nav_wrapper');
const hamBtn = document.querySelector('.ham_btn');
const hamX = document.querySelector('.ham_x');
const overlay = document.querySelector('.overlay');

const [
  link1, 
  link2, 
  link3,
  link4, 
  link5,
  link6,
  link7,
] = [
  document.querySelector('.link_1'),
  document.querySelector('.link_2'),
  document.querySelector('.link_3'),
  document.querySelector('.link_4'),
  document.querySelector('.link_5'),
  document.querySelector('.link_6'),
  document.querySelector('.link_7'),
]

const menuLinks = [link1, link2, link3, link4, link5, link6, link7];

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
menuLinks.forEach(e => e.addEventListener("click", () => {
  deactive();
}))

openMenu(hamBtn);
closeMenu(overlay)
closeMenu(hamX)
