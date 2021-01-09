const btndrop = document.querySelector('.dropdown1');
const useractive = document.querySelector('.user--menu');

btndrop.addEventListener('click', () => {
  useractive.classList.toggle('showuser');
});


