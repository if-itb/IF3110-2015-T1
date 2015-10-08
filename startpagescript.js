var sticky = document.querySelector('.sticky');
  var origOffsetY = sticky.offsetTop;

  function onScroll(e) {
    window.scrollY >= origOffsetY ? sticky.classList.add('fixed') :
                                    sticky.classList.remove('fixed');
  }

  document.addEventListener('scroll', onScroll);