// Header scroll effect
export function initHeaderScroll() {
  $(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
      $('.netflix-header').addClass('scrolled');
    } else {
      $('.netflix-header').removeClass('scrolled');
    }
  });
}

// Smooth scroll for navigation links
export function initSmoothScroll() {
  $('.nav-links a').click(function(e) {
    e.preventDefault();
    const target = $(this).attr('href');
    
    if (target.startsWith('#') && target !== '#home') {
      const section = $(target);
      if (section.length) {
        $('html, body').animate({
          scrollTop: section.offset().top - 100
        }, 500);
      }
    } else if (target === '#home') {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
    }
  });
}

// Profile menu
export function initProfileMenu(showNotification) {
  $('.profile-icon').click(function() {
    const actions = ['Perfil', 'Conta', 'Ajuda', 'Sair da Netflix'];
    const action = actions[Math.floor(Math.random() * actions.length)];
    showNotification(`Navegando para ${action}...`);
  });
}
