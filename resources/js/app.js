import './bootstrap';

// Hamburger
const hamburger = document.getElementById('hamburger')
const navMenu = document.getElementById('nav-menu')

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('hamburger-active')
  navMenu.classList.toggle('max-h-40')
  navMenu.classList.toggle('max-h-0')
})

// search
const searchForm = document.getElementById('search-form')
const search = document.getElementById('search')
const searchBtn = document.getElementById('search-btn')
const navItems = document.getElementById('nav-items')

searchBtn.addEventListener('click', () => {
  if(hamburger.classList.contains('hamburger-active')) hamburger.click();
  search.focus();
  searchForm.classList.toggle('-z-10')
  searchForm.classList.toggle('opacity-0')
  Array.from(searchBtn.children).forEach(child => child.classList.toggle('opacity-0'))
})