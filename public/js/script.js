//CHANGER NAVBAR AU SCROLL

//On selectionne la nav
const nav = document.querySelector('nav');

//On gère le scroll
window.onscroll = function() {
  if (document.documentElement.scrollTop > 720) {
    nav.classList.add('pageScroll');
  } else {
    nav.classList.remove('pageScroll');
  }
};