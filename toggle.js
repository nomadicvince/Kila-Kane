const hidden = document.querySelector('#switch');
const menu = document.querySelector('.hidden-nav');
const linx = document.querySelector('.hidden-nav a').parentElement.parentElement;

(function (){

  hidden.addEventListener('mousedown', revealMenu);

  function revealMenu(e) {
    let initHeight = 'auto';

    if (menu.style.display === 'none') {
        menu.style.display = 'block';
        menu.style.height = initHeight;
    } else {
        menu.style.display = 'none';        
    }
  }
})();
  
window.addEventListener('resize', function(){
  if(window.innerWidth >= 750) {
    linx.remove();
  } else if (window.innerWidth <= 750){
    menu.style.display = 'block';
  } else {
    menu.style.display = 'block';
  }
});

linx.addEventListener('click', function(){
  menu.style.display = 'none';
});
