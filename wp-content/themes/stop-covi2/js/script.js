var derniere_position_de_scroll_connue = window.scrollY;
var ticking = false;
const header = document.getElementById('header');
const main = document.getElementById('main');

function eventOnScroll(position_scroll) {
  if (position_scroll <= 10) {
    header.classList.add('on-top');
    main.classList.add('on-top');
  } else {
    header.classList.remove('on-top');
    main.classList.remove('on-top');
  }
}

window.addEventListener('scroll', function(e) {
  derniere_position_de_scroll_connue = window.scrollY;

  if (!ticking) {
    window.requestAnimationFrame(function() {
      eventOnScroll(derniere_position_de_scroll_connue);
      ticking = false;
    });
  }

  ticking = true;
});

const checkbox = document.getElementById('rgpd');
var phrase_checkbox = document.getElementById('phrase-checkbox');

if (checkbox) {
  checkbox.addEventListener('change', function() {
    if (checkbox.checked == true) {
      phrase_checkbox.classList.add('checked');
    } else {
      phrase_checkbox.classList.remove('checked');
    }
  })
}

const catalogue_btns = document.getElementsByClassName('boutique'),
      catalogue_menu = document.getElementById('categories-menu');
var closed_catalogue_menu = true;

if (catalogue_btns.length == 2) {
  for (let i=0; i<catalogue_btns.length; i++) {
    catalogue_btns[i].addEventListener('click', function(el) {
      closed_catalogue_menu = !closed_catalogue_menu;
      catalogue_menu.classList.toggle('closed');
      catalogue_menu.classList.toggle('opened');
      if (!closed_catalogue_menu) {
        document.getElementsByTagName('body')[0].style.overflow = 'hidden';
        document.getElementsByTagName('body')[0].style.height = '100vh';
        header.classList.remove('on-top');
        main.classList.remove('on-top');
        setTimeout(function(){
          header.classList.remove('on-top');
          main.classList.remove('on-top');
        }, 50);
      } else {
        document.getElementsByTagName('body')[0].style.overflow = 'visible';
        document.getElementsByTagName('body')[0].style.height = '100%';
        header.classList.add('on-top');
        main.classList.add('on-top');
      }
    });
  }
}
