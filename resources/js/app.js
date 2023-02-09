import './bootstrap';

// Hamburger
const hamburger = document.getElementById('hamburger')
const navMenu = document.getElementById('nav-menu')

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('hamburger-active')
  navMenu.classList.toggle('max-h-40')
  navMenu.classList.toggle('max-h-0')
})
