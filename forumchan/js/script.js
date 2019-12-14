'use strict';

// window

window.addEventListener('resize', function() {
  console.log(window.innerWidth);
});

const search = document.querySelector('#search')
const mob_search = document.querySelector('.mon_search')
search.onclick = () => {
  if (search.classList.contains('find')){
    search.textContent = 'Найти';
  }
  else {
    search.textContent = 'Закрыть';
  }
  search.classList.toggle('find')
  mob_search.classList.toggle('mon_search__active')
}