
const btn = document.querySelector('.nav__left--icon');
const body =  document.querySelector('.body');
 

btn.addEventListener('click', () => {
  body.classList.toggle('sidebar-expand');
});